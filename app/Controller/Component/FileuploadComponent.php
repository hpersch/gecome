<?php

/**
 * Description of FileuploadComponent -> componente pode ser usados em controllers
 * para upload de imagens no server web da página
 *
 * @author evandro
 */
class FileuploadComponent extends Component {

    //file name, used in the database too.
    private $name;

    public function getName() {
        if ($this->name)
            return $this->name;

        return false;
    }

    public function setName($name) {
        $this->name = $name;
    }

    /**
     * uploads files to the server
     * @params:
     * 		$folder 	= the folder to upload the files e.g. 'img/files'
     * 		$formdata 	= the array containing the form files
     * 		$itemId 	= id of the item (optional) will create a new sub folder
     * @return:
     * 		will return an array with the success of each file upload
     */
    //created randon name for file on time(minutes and seconds and day)    
    function createName($base = null) {
        $data = date("YmdHis");

        if ($base != null) {
            return $data . "_" . $base;
        }

        return $data . "image_";
    }

    function uploadFiles($folder, $formdata, $itemId = null) {

        // setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // if itemId is set create an item folder
        if ($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
            // set new relative folder
            $rel_url = $folder . '/' . $itemId;

            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

        // list of permitted file types
        $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
        $result = false;
        $cont = 0;
        // loop through and deal with the files                                            
        foreach ($formdata as $file) {

            if ($cont > 0):

                $filename = str_replace(' ', '_', $file["name"]);

                // assume filetype is false
                $typeOK = false;

                // check filetype is ok
                foreach ($permitted as $type) {
                    if ($type == $file['type']) {
                        $typeOK = true;
                        break;
                    }
                }

                if ($typeOK) {
                    // switch based on error code
                    switch ($file['error']) {
                        case 0:

                            $filename = $this->createName($filename);

                            //seta nome para uso no objeto
                            $this->setName($filename);

                            // check filename already exists
                            if (!file_exists($folder_url . '/' . $filename)) {
                                // create full filename
                                $full_url = $folder_url . '/' . $filename;
                                $url = $rel_url . '/' . $filename;

                                // upload the file
                                $success = move_uploaded_file($file['tmp_name'], $url);
                            } else {

                                //exception case already exists                                          
                                throw new Exception("Arquivo já existe no diretório!");
                            }

                            // if upload was successful
                            if ($success) {
                                // save the url of the file
                                $result['urls'][] = $url;
                            } else {
                                $result['errors'][] = "Error uploaded $filename. Please try again.";
                            }
                            break;
                        case 3:
                            // an error occured
                            $result['errors'][] = "Error uploading $filename. Please try again.";
                            break;
                        default:
                            // an error occured
                            $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                            break;
                    }
                } elseif ($file['error'] == 4) {
                    // no file was selected for upload
                    $result['nofiles'][] = "No file Selected";
                } else {
                    // unacceptable file type
                    $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
                }

            endif;

            $cont++;
        }

        return $result;
    }

}
