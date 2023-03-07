$files = array_filter($_FILES['basvuruTaliBayiVergiLevhasi']['name']); //Use something similar before processing files.
	$faturaAdi=time();
	$tmpFilePath = $_FILES['basvuruTaliBayiVergiLevhasi']['tmp_name'];
	if ($tmpFilePath != "")
	{
		$newFilePath = "Images/Hasarlar/".$faturaAdi ."-" . $_FILES['basvuruTaliBayiVergiLevhasi']['name'];
		if(move_uploaded_file($tmpFilePath, $newFilePath)) 
		{				
			$query2 = $db->insert('hasarResim')
			->set(array(
				'hasarResimHasarID' => $primaryID,
				'basvuruTaliBayiVergiLevhasi' => $faturaAdi ."-" . $_FILES['basvuruTaliBayiVergiLevhasi']['name']	
			));			
		}
	}

	$files = array_filter($_FILES['basvuruTaliBayiVergiLevhasi']['name']); 
	$fileName = mt_rand();
	$tmpFilePath = $_FILES['basvuruTaliBayiVergiLevhasi']['tmp_name'];
	if ($tmpFilePath != "")
	{
		$newFilePath = "../Images/VergiLevhasi/".$fileName ."-" .$_FILES['basvuruTaliBayiVergiLevhasi']['name'];
		if(move_uploaded_file($tmpFilePath, $newFilePath)) 
		{
			$parametreler=array_merge($parametreler,array('basvuruTaliBayiVergiLevhasi' => $fileName. "-" .$_FILES['basvuruTaliBayiVergiLevhasi']['name']));
		}		
	}
