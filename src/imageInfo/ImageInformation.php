<?php
/**
 * @package     ImageInformation class
 * @version     1.0
 * @author      Prakash Bhandari (http://www.prakashbhandari.com.np)
 * @license     This software is licensed under the MIT license: http://opensource.org/licenses/MIT
 * @copyright   Prakash Bhandari (http://www.prakashbhandari.com.np)
 */

namespace imageInfo;

class ImageInformation
{
    public $unavailable = "Info. Unavailable";

    function getInformation($imagePath)
    {

        if ((isset($imagePath)) and (file_exists($imagePath))) {

            $ifdo = read_exif_data($imagePath, 'IFD0', 0);
            $exif = read_exif_data($imagePath, 'EXIF', 0);

            // Maker
            if (@array_key_exists('Make', $ifdo)) {
                $maker = $ifdo['Make'];
            } else {
                $maker = $this->unavailable;
            }

            // Model
            if (@array_key_exists('Model', $ifdo)) {
                $model = $ifdo['Model'];
            } else {
                $model = $this->unavailable;
            }

            // Exposure
            if (@array_key_exists('ExposureTime', $ifdo)) {
                $exposure = $ifdo['ExposureTime'];
            } else {
                $exposure = $this->unavailable;
            }

            // Aperture
            if (@array_key_exists('ApertureFNumber', $ifdo['COMPUTED'])) {
                $aperture = $ifdo['COMPUTED']['ApertureFNumber'];
            } else {
                $aperture = $this->unavailable;
            }

            // Created Date
            if (@array_key_exists('DateTime', $ifdo)) {
                $createDate = $ifdo['DateTime'];
            } else {
                $createDate = $this->unavailable;
            }

            // ISO
            if (@array_key_exists('ISOSpeedRatings', $exif)) {
                $iso = $exif['ISOSpeedRatings'];
            } else {
                $iso = $this->unavailable;
            }

            // Focal Length
            if (@array_key_exists('FocalLength', $exif)) {
                $focalLength = $exif['FocalLength'];
            } else {
                $focalLength = $this->unavailable;
            }

            $infoArray = array();
            $infoArray['maker'] = $maker;
            $infoArray['model'] = $model;
            $infoArray['exposure'] = $exposure;
            $infoArray['aperture'] = $aperture;
            $infoArray['date'] = $createDate;
            $infoArray['iso'] = $iso;
            $infoArray['focalLength'] = $focalLength;
            return $infoArray;

        } else {
            return false;
        }
    }
}