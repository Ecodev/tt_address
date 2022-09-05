<?php

namespace TYPO3\TtAddress\Hooks\DataHandler;

/**
 * Class BackwardsCompatibilityNameFormat
 */
class BackwardsCompatibilityNameFormat
{

    /**
     * looks for tt_address records with changes to the first, middle, and
     * last name fields to come by. This function will then write changes back
     * to the old combined name field in a configurable format
     */
    public function processDatamap_postProcessFieldArray(string $status, string $table, int $id, &$fieldArray): void
    {

        if ($table == 'tt_address' && ($status == 'new' || $status == 'update')) {
            if ($status == 'update') {
                $address = $this->getFullRecord($id);
            } else {
                $address = $fieldArray;
            }

            $format = '%1$s %3$s';

            $newRecord = array_merge($address, $fieldArray);

            $combinedName = trim(sprintf(
                $format,
                $newRecord['last_name'],
                $newRecord['middle_name'],
                $newRecord['first_name']
            ));

            if (!empty($combinedName)) {
                $fieldArray['name'] = $combinedName;
            }
        }
    }

    /**
     * gets a full tt_address record
     *
     * @param int $uid unique id of the tt_address record to get
     * @return array full tt_address record with associative keys
     */
    protected function getFullRecord($uid)
    {
        $row = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
            '*',
            'tt_address',
            'uid = ' . $uid
        );

        return $row[0];
    }
}
