<?php
	class json
	{
		private $jsonFile="JSON files/data.json";
		
		function getRows()
		{
			if(file_exists($this->jsonFile))
			{
				$jsonData=file_get_contents($this->jsonFile);
				$data=json_decode($jsonData,true);
				if(!empty($data))
				{
					usort($data,function($a,$b)
					{
						return $b['id']-$a['id'];
					});
				}
				if(!empty($data))
				{
					return $data;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		
		function getSingle($id)
		{
			$jsonData=file_get_contents($this->jsonFile);
			$data=json_decode($jsonData,true);
			$singleData=array_filter($data,function($var)use($id)
			{
				if(!empty($var['id']) && $var['id']==$id)
				{
					return true;
				}
				else
				{
					return false;
				}
			});
			$singleData=array_values($singleData)[0];
			if(!empty($singleData))
			{
				return $singleData;
			}
			else
			{
				return false;
			}
		}
		function insert($newData)
		{
			if(!empty($newData))
			{
				$id=time();
				$newData['id']=$id;
				$jsonData=file_get_contents($this->jsonFile);
				$data=json_decode($jsonData,true);
				$data = !empty($data) ? array_filter($data) : $data;
				if (!empty($data))
				{
					array_push($data, $newData);
				}
				else
				{
					$data[] = $newData;
				}
				$insert = file_put_contents($this->jsonFile, json_encode($data));
				if ($insert) 
				{
					return $id;
				} 
				else 
				{
					return false;
				}

			}
		}
		function update($upData,$id)
		{
			if(!empty($upData) && !empty($id))
			{
				$jsonData=file_get_contents($this->jsonFile);
				$data=json_decode($jsonData,true);
				foreach ($data as $key => $value) 
				{ 
					if ($value['id'] == $id) 
					{ 
						if(isset($upData['name']))
						{ 
							$data[$key]['name'] = $upData['name']; 
						} 
						if(isset($upData['email']))
						{ 
							$data[$key]['email'] = $upData['email']; 
						} 
						if(isset($upData['phone']))
						{ 
							$data[$key]['phone'] = $upData['phone']; 
						} 
						if(isset($upData['country']))
						{ 
							$data[$key]['country'] = $upData['country']; 
						} 
					} 
				}
				$update = file_put_contents($this->jsonFile, json_encode($data));
				if ($update)
				{
					return true;
				}
				else 
				{
					return false;
				}
			}
			else
			{ 
				return false; 
			} 
		}
		function deleteData($id)
		{
			$jsonData=file_get_contents($this->jsonFile);
			$data=json_decode($jsonData,true);
			$newData = array_filter($data, function ($var) use ($id) 
			{
				return ($var['id'] != $id);
			});
			$delete = file_put_contents($this->jsonFile, json_encode($newData));
			if ($delete) 
			{
				return true;
			} 
			else 
			{
				return false;
			}

		}
	}
?>