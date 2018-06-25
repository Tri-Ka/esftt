<?php

/**
 * EsfttHelper.
 */

/**
 * Truncate text and keep suppressed text into a template.
 *
 * @param <string> $text   : text to truncate
 * @param <int>    $length : size of text to stay visible
 * @param <string> $wrap   : template to wrap the hidden part of text
 *
 * @return <string> $text truncated
 */
function ppst_truncate_text($text, $length = 30, $truncate_string = '...', $truncate_lastspace = false)
{
    $text = strip_tags(sfOutputEscaper::unescape($text));

    if ($text == '') {
        return '';
    }

    $mbstring = extension_loaded('mbstring');
    if ($mbstring) {
        $old_encoding = mb_internal_encoding();
        @mb_internal_encoding(mb_detect_encoding($text));
    }
    $strlen = ($mbstring) ? 'mb_strlen' : 'strlen';
    $substr = ($mbstring) ? 'mb_substr' : 'substr';

    if ($strlen($text) > $length) {
        $truncate_text = $substr($text, 0, $length - $strlen($truncate_string));
        if ($truncate_lastspace) {
            $truncate_text = preg_replace('/\s+?(\S+)?$/', '', $truncate_text);
        }
        $text = $truncate_text.$truncate_string;
    }

    if ($mbstring) {
        @mb_internal_encoding($old_encoding);
    }

    return $text;
}

function renderPagination($pager, $url, $params = array(), $ajax = null)
{
    if (!empty($params) && $params instanceof sfOutputEscaper) {
        $params = $params->getRawValue();
    }

    $params = (!empty($params)) ? '&'.http_build_query($params) : '';

    if ($pager->haveToPaginate()) {
        echo '<nav>';
        echo '<ul class="pagination '.((null !== $ajax) ? 'paginationAjax' : '').'" data-load="'.((null !== $ajax) ? $ajax : '').'">';

        echo '
          <li>
            <a class="pagination_list" href="'.$url.'?page=1'.$params.'" title="'.__('aller à la première page').'"><<</a>
          </li>
          <li>
            <a class="pagination_list" href="'.$url.'?page='.$pager->getPreviousPage().''.$params.'" title="'.__('aller à la page précédente').'"><</a>
          </li>
        ';

        foreach ($pager->getLinks() as $page) {
            if ($page === $pager->getPage()) {
                $class = 'current';
            } else {
                $class = '';
            }

            echo '<li><a class="pagination_list '.$class.'" href="'.$url.'?page='.$page.''.$params.'" title="'.__('aller à la page').' '.$page.'" >'.$page.'</a></li>';
        }

        echo '
          <li>
            <a class="pagination_list" href="'.$url.'?page='.$pager->getNextPage().''.$params.'" title="'.__('aller à la page suivante').'">></a>
          </li>
          <li>
            <a class="pagination_list" href="'.$url.'?page='.$pager->getLastPage().''.$params.'" title="'.__('aller à la dernière page').'">>></a>
          </li>
        ';

        echo '</ul>';
        echo '</nav>';
    }
}

function button($params)
{
    $r = '';
    $model = '';
    $attributes = '';

    $params['url'] = isset($params['url']) ? $params['url'] : '';
    $params['type'] = isset($params['type']) ? $params['type'] : 'a';
    $params['class'] = isset($params['class']) ? $params['class'] : '';
    $params['attributes'] = isset($params['attributes']) ? $params['attributes'] : array();
    $params['icon'] = isset($params['icon']) ? $params['icon'] : 'locked';

    switch ($params['type']) {
        case 'a':
            $model = '
<a href="%url%" title="%title%" class="button %class%" %attributes% %confirm%>
    <span class="ui-button-text">%text%</span>
</a>';
            break;
        case 'submit':
            $model = '<input type="submit" value="%text%" class="button %class%" %attributes% %confirm% title="%title%" />';
            break;
        case 'submitbtn':
            $model = '<button type="submit" class="button %class%" %attributes% %confirm% title="%title%">%text%</button>';
            break;
        case 'button':
            $model = '<input type="button" value="%text%" class="ui-button ui-widget ui-state-default ui-button-text-only %class%" %attributes% %confirm% title="%title%" />';
            break;
        case 'a-icon':
            $model = '
<a href="%url%" class="ui-button ui-widget ui-button-text-icon-primary ui-state-default %class%" title="%title%" %attributes% %confirm%>
    <span class="ui-button-icon-primary ui-icon ui-icon-%icon%"></span>
    <span class="ui-button-text">%text%</span>
</a>';
            break;
        case 'a-icon-text':
            $model = '
<a href="%url%" class="%class% clearfix" title="%title%" %attributes% %confirm%>
    <span class="ui-icon ui-icon-%icon% menu-icon f-l"></span>
    <span>%text%</span>
</a>';
            break;
        case 'a-icon-only':
            $model = '
<a href="%url%" class="ui-icon-fb ui-state-default %class%" title="%title%" %attributes% %confirm%>
    <span class="ui-button-icon-primary ui-icon ui-icon-%icon%"></span>
</a>';
            break;
        case 'a-icon-fugue':
            $model = '
<a href="%url%" class="%class%" title="%title%" %attributes% %confirm%>
    <span class="fugue fugue-%icon%"></span>
    <span>%text%</span>
</a>';
            break;
        case 'a-icon-only-fugue':
            $model = '
<a href="%url%" class="%class%" title="%title%" %attributes% %confirm%>
    <span class="fugue fugue-%icon%"></span>
</a>';
            break;
        case 'button-icon':
            $model = '
<button class="ui-button ui-widget ui-state-default ui-button-icon-only gris %class%" title="%title%" %attributes% %confirm%>
    <span class="ui-button-icon-primary ui-icon ui-icon-%icon%"></span>
    <span class="ui-button-text">%text%</span>
</button>';
            break;
    }

    if (!isset($params['title'])) {
        $params['title'] = $params['text'];
    }

    if (isset($params['confirm'])) {
        $params['confirm'] = 'onclick="return confirm(\''.$params['confirm'].'\')"';
    } else {
        $params['confirm'] = '';
    }

    foreach ($params['attributes'] as $name => $value) {
        $attributes .= ' '.$name.'="'.$value.'"';
    }

    return str_replace(
        array(
            '%url%',
            '%title%',
            '%class%',
            '%text%',
            '%attributes%',
            '%confirm%',
            '%icon%',
            ),
        array(
            $params['url'],
            $params['title'],
            $params['class'],
            $params['text'],
            $attributes,
            $params['confirm'],
            $params['icon'],
            ),
        $model
    );
}

function nullForStats($value, $replace)
{
    $model = '<span class="grey">%s</span>';

    if (null === $value || 0 == $value) {
        return sprintf($model, $replace);
    }

    return $value;
}

/**
 * Formats a date in "time ago" style or "DD Month YYYY" and returns html.
 *
 * @param string $d
 * @param string $appTimezone
 * @param string $culture
 *
 * @return string
 */
function ppst_time_ago($date, $culture = null)
{
    if (null === $date) {
        return '';
    }

    $timestamp = strtotime($date);

    $text = null;

    use_helper('I18N');
    $text = __('%s ago', array('%s' => distance_of_time_in_words($timestamp)));

    return sprintf('<time class="dateTime" title="%s">%s</time>', $date, $text);
}

function squareMe($src, $name, $dim = 64)
{
    $attributes = '';
    $sizes = @getimagesize(sfConfig::get('sf_web_dir').$src);

    if (false !== $sizes) {
        if ($sizes[0] > $sizes[1]) {
            $attributes = 'height="'.$dim.'" '.'style="left:-39%;"';
        } else {
            $attributes = 'width="'.$dim.'"';
        }
    }

    $t = '
<div class="img-layered il-%s">
    <img src="%s" alt="%s" %s />
</div>
';

    echo sprintf($t, $dim, $src, $name, $attributes);
}

function renderAvatar($params)
{
    $tpl = '<img class="av%userid% avatar" data-src="%userid%" data-load="%username%" alt="%username%"  src="%src%" height="%height%" />';

    echo str_replace(
        array_keys($params),
        array_values($params),
        $tpl
    );
}

/**
 * @param type $params
 *
 * count:   number to display;
 * ico:     icon to display
 * allwaysDisplay:  true/false display notif even if count egual zero
 * class:
 *      - default
 *      - idea-messaging
 *      - planning
 * url:     redirect on click
 * plural:  type when count > 1
 *
 * @return bool
 */
function displayNotifCount($params)
{
    $model = '';

    $params['count'] = isset($params['count']) ? $params['count'] : 0;
    $params['type'] = isset($params['type']) ? $params['type'] : '';
    $params['ico'] = isset($params['ico']) ? $params['ico'] : '';
    $params['allwaysDisplay'] = isset($params['allwaysDisplay']) ? $params['allwaysDisplay'] : false;
    $params['class'] = isset($params['class']) ? $params['class'] : '';
    $params['url'] = isset($params['url']) ? $params['url'] : null;
    $params['blink'] = isset($params['blink']) ? $params['blink'] : '';

    if ($params['blink'] == true) {
        $params['blink'] = 'notif-alert-blink';
    }

    if (1 < $params['count']) {
        if (isset($params['plural'])) {
            $params['type'] = $params['plural'];
        } else {
            $params['type'] .= 's';
        }
    }

    $params['class'] = 'notif-alert-'.$params['class'];

    $model = '';

    $model .= '<div class="notif-alert-default %class% %blink%">';
    (null != $params['url']) ? $model .= '<a href="%url%">' : '';
    $model .= '<span class="addTipsy cool-hover notif_ico fugue %ico%"  original-title="vous avez %count% %type%" ></span>';
    $model .= '<span class="notif_number">%count%</span>';
    (null != $params['url']) ? $model .= '</a>' : '';
    $model .= '</div>';

    if (0 < $params['count'] || true == $params['allwaysDisplay']) {
        return str_replace(
            array(
                '%ico%',
                '%count%',
                '%type%',
                '%class%',
                '%url%',
                '%blink%',
                ),
            array(
                $params['ico'],
                $params['count'],
                $params['type'],
                $params['class'],
                $params['url'],
                $params['blink'],
                ),
            $model
        );
    } else {
        return false;
    }
}

function helptxt($text, $class = '')
{
    return '<div class="help-txt '.$class.'"><p>'.$text.'</p></div>';
}

function ppst_encode_to_rtf($text)
{
    return utf8_decode(html_entity_decode($text, ENT_QUOTES));
}

function implodeObject($glue, $array, $toStringFunction = '__toString')
{
    $return = array();

    foreach ($array as $o) {
        $return[] = $o->$toStringFunction();
    }

    return implode($glue, $return);
}

function simplyfyText($text, $all = false)
{
    $text = trim($text);
    $text = html_entity_decode($text);
    $text = nl2br($text);
    $text = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $text);


    if ($all) {
        $text = strip_tags($text);
    } else {
        $text = strip_tags($text, '<p> <div>');

        if (400 < strlen($text)) {
            $text = truncate($text, 400, '[...]');
        }
    }

    return $text;
}

function truncate($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true)
{
    if ($considerHtml) {
        if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }
        preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
        $total_length = strlen($ending);
        $open_tags = array();
        $truncate = '';

        foreach ($lines as $line_matchings) {
            // if there is any html-tag in this line, handle it and add it (uncounted) to the output
            if (!empty($line_matchings[1])) {
                // if it's an "empty element" with or without xhtml-conform closing slash
                if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                    // do nothing
                  // if tag is a closing tag
                } elseif (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                    // delete tag from $open_tags list
                    $pos = array_search($tag_matchings[1], $open_tags);
                    if ($pos !== false) {
                        unset($open_tags[$pos]);
                    }
                    // if tag is an opening tag
                } elseif (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                    // add tag to the beginning of $open_tags list
                    array_unshift($open_tags, strtolower($tag_matchings[1]));
                }
                // add html-tag to $truncate'd text
                $truncate .= $line_matchings[1];
            }
            // calculate the length of the plain text part of the line; handle entities as one character
            $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
            if ($total_length+$content_length> $length) {
                // the number of characters which are left
                $left = $length - $total_length;
                $entities_length = 0;
                // search for html entities
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                    // calculate the real length of all entities in the legal range
                    foreach ($entities[0] as $entity) {
                        if ($entity[1]+1-$entities_length <= $left) {
                            $left--;
                            $entities_length += strlen($entity[0]);
                        } else {
                            // no more characters left
                            break;
                        }
                    }
                }
                $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                // maximum lenght is reached, so get off the loop
                break;
            } else {
                $truncate .= $line_matchings[2];
                $total_length += $content_length;
            }
            // if the maximum length is reached, get off the loop
            if ($total_length>= $length) {
                break;
            }
        }
    } else {
        if (strlen($text) <= $length) {
            return $text;
        } else {
            $truncate = substr($text, 0, $length - strlen($ending));
        }
    }
    // if the words shouldn't be cut in the middle...
    if (!$exact) {
        // ...search the last occurance of a space...
        $spacepos = strrpos($truncate, ' ');
        if (isset($spacepos)) {
            // ...and cut the text in this position
            $truncate = substr($truncate, 0, $spacepos);
        }
    }
    // add the defined ending to the text
    $truncate .= $ending;
    if ($considerHtml) {
        // close all unclosed html-tags
        foreach ($open_tags as $tag) {
            $truncate .= '</' . $tag . '>';
        }
    }

    return $truncate;
}
