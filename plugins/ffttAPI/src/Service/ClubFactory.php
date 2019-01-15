<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Service;


use FFTTApi\Model\Club;

class ClubFactory
{
    /**
     * @param array $data
     * @return Club[]
     */
    public function createFromArray(array $data) : array {
        $result = [];
        foreach ($data as $clubData){
            $result[] = new Club(
                $clubData['numero'],
                $clubData['nom'],
                is_array($clubData['validation']) ? null : \DateTime::createFromFormat('d/m/y', $clubData['validation'])
            );
        }
        return $result;
    }
}