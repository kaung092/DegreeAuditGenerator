<?php
		if(isset($_GET['text']))
		{
			$text = $_GET['text'];

			$input_lines = explode("\n", $text);
			$EEcur = file_get_contents("EEcur.json"); //EE curriculum 
			$EEcur_json = json_decode($EEcur, true);
		

			$beg_s='<Cell ss:StyleID="s62"><Data ss:Type="String">';
			$beg_sGray='<Cell ss:StyleID="s7"><Data ss:Type="String">';
			$end='</Data></Cell>';

			$output_M=array();	
			$output_S=array();	
			$output_EGR=array();	
			$output_EEC=array();	
			$output_EER=array();	
			$output_EEL=array();	
			$output_LE=array();	
			$output_LA=array();	
			$output_ENL=array();	
			$output_Oth=array();	


			foreach($input_lines as $line)
			{
				if($line == null){}
				else{
				$line1 = preg_replace("/\s+/"," ",$line);
				$line = explode(" ",$line1);

				$code = $line[1].' '.$line[2];

				$row['classCode'] = $line[1].' '.$line[2];
				$row['semester'] = $line[0];
				$row['credit'] = $line[3];

				if(strlen($line[4]) <=2) //The grade column is not blank
				{
					$row['grade'] = $line[4];
					$index = 5;
					$beg_s ='<Cell ss:StyleID="s62"><Data ss:Type="String">'; 
				}
				else
				{
					$row['grade'] = 'IP';
					$beg_s = $beg_sGray; //highlight "In Progress" course
					$index =4;
				}

				$row['category'] =  'Others';
				$Cat = 'Others';	
				$row['class']= "";
				for($s= $index;$s<count($line);$s++)
				{
					$row['class'] .= $line[$s]." ";
				}


				$Cat2 ="";
				foreach($EEcur_json as $key=>$EEcur)
				{
					if($code  == $key)
					{
						$Cat = $EEcur['category'];
						$Cat2 = $EEcur['category2'];

						$F_grade =isset($EEcur['F_grade'])?$EEcur['F_grade']:null;
						if($or == null) //Courses that are interchangable with other classes
						{
							$or = isset($EEcur['or'])?$EEcur['or']:null;
						}
						$input_array[$code]['category'] = $Cat;	
						$row['category'] = $Cat;
					}
				}


			$output='';
			$output.=$beg_s.$row['semester'].$end."\n";
			$output.=$beg_s.$row['classCode'].$end."\n";
			$output.=$beg_s.$row['credit'].$end."\n";
			$output.=$beg_s.$row['grade'].$end."\n";
			$output.=$beg_s.$row['class'].$end."\n";

				if($Cat == 'MATHEMATICS' )
				{
					if(isset($F_grade) && strnatcmp ($row['grade'],$F_grade ) < 0) // if grade greater than failing grade
					{
						$output_M.array_push($output_M,$output);
						asort($output_M);
					}
					else
					{
						//Did not meet minimum grade. skipping
					}
				}
				else if($Cat == 'SCIENCES')
				{
					if(isset($F_grade) && strnatcmp ($row['grade'],$F_grade ) < 0) // if grade greater than failing grade
					{
						$output_S.array_push($output_S,$output);
						asort($output_S);
					}
					else
					{
						//Did not meet minimum grade. skipping
					}
				}
				else if($Cat == 'ENGINEERING')
				{
					$output_EGR.array_push($output_EGR,$output);
					asort($output_EGR);
				}
				else if($Cat == 'EE CORE')
				{
					$output_EEC.array_push($output_EEC,$output);
					asort($output_EEC);
				}
				else if($Cat == 'EE RESTRICTED ELECTIVES')
				{
					if(count($output_EER)<2)//Show only 2
					{
						$output_EER.array_push($output_EER,$output);
						asort($output_EER);
					}
					else{
						$Cat = $Cat2;
					}
				}
				else if($Cat == 'EE LAB ELECTIVES')
				{
					if(count($output_EEL)<2)
					{
						$output_EEL.array_push($output_EEL,$output);
						asort($output_EEL);
					}
				}
				else if($Cat == 'LECTURE ELECTIVES')
				{
					if(count($output_LE)<6) //show only 6 courses
					{
						$output_LE.array_push($output_LE,$output);
						asort($output_LE);
					}
				}
				else if($Cat == 'LIBERAL ARTS')
				{
					$output_LA.array_push($output_LA,$output);
					asort($output_LA);
				}
				else if($Cat == 'ENGLISH')
				{
					if($code == $or) //interchangable course already added
					{
						$or = null;
					}
					else
					{
						$output_ENL.array_push($output_ENL,$output);
						asort($output_ENL);
					}
				}
				else if($Cat == 'Others')
				{
					$output_Oth.array_push($output_Oth,$output);
					asort($output_Oth);
				}




				$i++;
				}
			}



			//Add Extra Row for EE Restricted category
			$output='';
			$output.=$beg_s.' '.$end."\n";
			$output.=$beg_s.' '.$end."\n";
			$output.=$beg_s.' '.$end."\n";
			$output.=$beg_s.' '.$end."\n";
			$output.=$beg_s.' '.$end."\n";
			$output_EER.array_push($output_EER,$output);

			include('HA_xcel.php');
			

			echo (json_encode($input_array));//Not really doing anything with it
			


			
		}


?>
