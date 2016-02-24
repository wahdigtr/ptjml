<?php

	class WebSetting extends AppModel{
		var $name 	= 'WebSetting';
		var $key 	= 'MIMIKA';
		var $custom_settings = [];
	    public function changeName($field, $currentName, $data, $options){
	        $type = $data['WebSetting']['Site']['logo'];
	        $exType = explode('/', $type);
	        $count = count($exType)-1;
	        $ext = $exType[$count];
	        return 'logo.'.$ext;
	    }


	    //retrieve configuration data from the DB
	    function getcfg(){
	        // get all settings from db
	        $cfgs = $this->find('all', array('fields'=>array('id','key_setting','value_setting')));

	        // if not is array we exit
	        if( !is_array($cfgs) ) return;

	        // parse each setting
	        foreach($cfgs as $cfg) {

	            // build the array for use later
	            $data_array = array(
			                        'id' 		=> $cfg['WebSetting']['id'],
			                        'key' 		=> $cfg['WebSetting']['key_setting'],
			                        'values' 	=> $cfg['WebSetting']['value_setting'],
			                        'checksum' 	=> md5($cfg['WebSetting']['value_setting']) 
		                        );

	            $this->custom_settings[] = $data_array;

	            // write the config
	            Configure::write($this->key . '.' . $cfg['WebSetting']['key_setting'], $cfg['WebSetting']['value_setting']);
	        }
	    }

	    // actually don't needed, you can modify valuess in db directly
	    //write configuration data back to the DB
	    function writecfg(){
	        // read each setting from the array
	        foreach($this->custom_settings as $cfg) {
	            $new_values = Configure::read($this->key . '.' . $cfg['key']);

	            // if the setting have changed
	            if( md5($new_values) !=  $cfg['checksum']) {
	                // make sql
	                $this->data = array(
	                            'id'=> $cfg['id'],
	                            'key'=> $cfg['key'],
	                            'values'=> $new_values);
	                // save it
	                $this->save($this->data);
	            }
	        }
	    }		
	}

?>