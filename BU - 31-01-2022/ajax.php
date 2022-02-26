<?php 
	$mailDataArr = array();
	$mailData = general::get_data($mailDataArr);
	if(count($mailData)){
		$mailData = $mailData[0];
	}
	
	if(isset($_POST['section']) && $_POST['section'] == 'upload_multiple') {
		/* echo '<pre>';
		print_r($_FILES); */
		$_SESSION['Push_images'] = array();
		$_SESSION['Push_size'] = array();
		
		foreach($_FILES['myfile']['name'] as $ind => $val) {
			if(!is_dir('temp_files')){
				mkdir('temp_files');
			}
			$source= $_FILES['myfile']['tmp_name'][$ind];			
			$image_name = $val;
			$destination = 'temp_files/'.$image_name;						
			move_uploaded_file($source,$destination);
			array_push($_SESSION['Push_images'],$image_name);			
			array_push($_SESSION['Push_size'],$_FILES['myfile']['size'][$ind]);			
		}
		
		echo json_encode($_SESSION['Push_images'],true);
		die();
	}
	
	if(isset($_POST['section']) && $_POST['section'] == 'delete_file') {
		echo '<pre>';
	print_r($_SESSION['Push_images']);
		$name = $_POST['values'];
		$key = array_search($name, $_SESSION['Push_images']);
		unlink('temp_files/'.$_SESSION['Push_images'][$key]);
		/* $_SESSION['Push_images'][$key] = '';  */
		if (false !== $key) {
			unset($_SESSION['Push_images'][$key]);
			unset($_SESSION['Push_size'][$key]);
		}
	}
	
	if(isset($_POST['section']) && $_POST['section'] == 'contact_form') {
		$data = array();
		$ArrData = array(
			'title'			        =>	$_POST['fName'],			
			'email'			        =>	$_POST['email'],
			'mobile'			    =>	$_POST['mobile'],
			'message'				=>	$_POST['message'],			
		);
		$lastid = contact_form_data::add_record($ArrData);
		
		
		$tableStyle = 'border: 1px solid #ddd;text-align: left; border-colspan: colspan; width: 100%;';
		$tableCellStyle = 'border: 1px solid #ddd;text-align: left; padding: 15px;';
		$tableCellStyler = 'border: 1px solid #ddd;text-align: right; padding: 15px;';
		$tableCellStyleHead = 'border: 1px solid #ddd;text-align: center; padding: 15px;';

		
		$html = "<table style='".$tableStyle."'>
                <tr>
                    <td style='".$tableCellStyle."'>First Name</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['fName']."</td>                                    
                </tr>				
                <tr>
                    <td style='".$tableCellStyle."'>Phone Number</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['mobile']."</td>                                    
                </tr>
                <tr>
                    <td style='".$tableCellStyle."'>Email</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['email']."</td>                                    
                </tr>
				<tr>
                    <td style='".$tableCellStyle."'>Message</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['message']."</td>                                    
                </tr>
				</table>
				";
		$subject = 'New Contact Request';
		_send_mail($mailData['title'],$subject,$html,$mailData['cc'],$mailData['bcc'],$mailData['host_name'],$mailData['username'],$mailData['host_password'],$mailData['port_number'],'');
		$data['success'] = 1;
		echo json_encode($data,true);
		die();
	}
?>
