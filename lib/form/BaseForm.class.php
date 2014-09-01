<?php

/**
 * Base project form.
 *
 * @package    orange_ooi
 * @subpackage form
 * @author     Denis Fingonnet <denis.fingonnet@popsiit.net>
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony
{
    public function __construct($defaults = array(), $options = array(), $CSRFSecret = null)
    {
        parent::__construct($defaults, $options, $CSRFSecret);

        $this->widgetSchema->addOption('required_fields', $this->getRequiredFields());
    }

    /**
     * isSubmitted ?
     *
     * @param sfWebRequest $request
     * @param <string> $method
     * @return <boolean>
     */
    public function isSubmitted(sfWebRequest $request, $method = 'post')
    {
        return $request->hasParameter($this->getName());
    }

    /**
     * Bind params from request
     *
     * @param sfWebRequest $request
     */
    public function bindParameters(sfWebRequest $request)
    {
        $this->bind(
            $request->getParameter($this->getName()), $request->getFiles($this->getName())
        );
    }

    /**
     * Bind and Valid in one method
     *
     * @param sfWebRequest $request
     * @param <string> $method
     * @return <boolean>
     */
    public function bindAndValid(sfWebRequest $request, $method = 'post')
    {
        if ($this->isSubmitted($request, $method)) {
            $this->bindParameters($request);
            if ($this->isValid()) {
                return true;
            }
        }

        return false;
    }

    protected function getRequiredFields(sfValidatorSchema $validatorSchema = null, $format = null)
    {
        if (is_null($validatorSchema)) {
            $validatorSchema = $this->validatorSchema;
        }

        if (is_null($format)) {
            $format = $this->widgetSchema->getNameFormat();
        }

        $fields = array();

        foreach ($validatorSchema->getFields() as $name => $validator) {
            $field = sprintf($format, $name);
            if ($validator instanceof sfValidatorSchema) {
                // recur
                $fields = array_merge(
                    $fields, $this->getRequiredFields($validator, $field . '[%s]')
                );
            } else if ($validator->getOption('required')) {

                if (!($validator instanceof sfValidatorPass)) {

                    $fields[] = $field;
                }
            }
        }

        return $fields;
    }

     /**
     * Retourne dans une tableau toutes les erreurs d'un formulaire
     * 
     * @return array
     */
    public function getErrors()
    {
        $errors = array();

        // individual widget errors
        foreach ($this as $form_field) {
            
            if ($form_field->hasError()) {
                
                $error_obj = $form_field->getError();
                
                if ($error_obj instanceof sfValidatorErrorSchema) {
                    
                    foreach ($error_obj->getErrors() as $error) {
                        
                        // if a field has more than 1 error, it'll be over-written
                        $errors[$form_field->getName()] = $error->getMessage();
                        
                    }
                    
                } else {
                    
                    $errors[$form_field->getName()] = $error_obj->getMessage();
                    
                }
            }
        }

        // global errors
        foreach ($this->getGlobalErrors() as $validator_error) {
            
            $errors[] = $validator_error->getMessage();
            
        }

        return $errors;
    }
}
