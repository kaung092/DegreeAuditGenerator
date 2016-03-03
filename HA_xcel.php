<?php

$name = isset($_GET['name'])?$_GET['name']:''; 

$file_name = "excel_output/DegreeAudit.xls";
$fh=fopen($file_name,'w') or die("Failed to create file");


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<?php
$header = <<< _END
<?xml version="1.0"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">

<OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
  <AllowPNG/>
</OfficeDocumentSettings>
<ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
	<WindowHeight>14960</WindowHeight>
	<WindowWidth>25600</WindowWidth>
	<WindowTopX>0</WindowTopX>
	<WindowTopY>0</WindowTopY>
	<ProtectStructure>False</ProtectStructure>
	<ProtectWindows>False</ProtectWindows>
</ExcelWorkbook>
 
<Styles>
	<Style ss:ID="Default" ss:Name="Normal">
		<Alignment ss:Vertical="Bottom"/>
		<Borders/>
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior/>
		<NumberFormat/>
		<Protection/>
	</Style><!-- Default -->
	  
	<Style ss:ID="s1" ss:Name="orange">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior ss:Color="#ff9933" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s1 -->
	  
	<Style ss:ID="s2" ss:Name="yellow">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior ss:Color="#FFF58C" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s2 -->
	  
	<Style ss:ID="s3" ss:Name="red">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior ss:Color="#FF3333" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s3 -->
	 
	<Style ss:ID="s4" ss:Name="blue">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior ss:Color="#042BD0" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s4 -->

	<Style ss:ID="s5" ss:Name="green">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior ss:Color="#00ff00" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s5 -->

	<Style ss:ID="s6" ss:Name="pink">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior ss:Color="#ffaaaa" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s6 -->

	<Style ss:ID="s7" ss:Name="grey">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior ss:Color="#bbbbbb" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s7 -->
	
	<Style ss:ID="s8" ss:Name="black">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#ffffff"/>
		<Interior ss:Color="#000000" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s8 -->
	
	<Style ss:ID="s9" ss:Name="lightblue">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior ss:Color="#00C1F1" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s9 -->
	
	<Style ss:ID="s62" ss:Name="white">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<!--<Interior ss:Color="#ffffff" ss:Pattern="Solid"/>-->
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s62 -->
	  
	<Style ss:ID="s63">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000"/>
		<Interior ss:Color="#CCFFCC" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s62 -->
	
	<Style ss:ID="s64" ss:Name="bold">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000" ss:Bold="1" />
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<Borders>
				<Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>


		</Borders>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s64 -->
	
	<Style ss:ID="s65" ss:Name="lightgreen">
		<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#000000" ss:Bold="1" />
		<Interior ss:Color="#2ef427" ss:Pattern="Solid"/>
		<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
		<Borders>
			<Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
		</Borders>
		<NumberFormat ss:Format="0"/>
	</Style><!-- s65 -->
 
 </Styles>

<Worksheet ss:Name="All" >
	<Table ss:ExpandedColumnCount="12" ss:ExpandedRowCount="10000" x:FullColumns="1"
	x:FullRows="1" ss:DefaultColumnWidth="115" ss:DefaultRowHeight="25">
	<Column ss:Index="1" ss:AutoFitWidth="0" ss:Width="135"/>  
	<Column ss:Index="2" ss:AutoFitWidth="0" ss:Width="75"/> 
	<Column ss:Index="3" ss:AutoFitWidth="0" ss:Width="65"/> 
	<Column ss:Index="4" ss:AutoFitWidth="0" ss:Width="60"/> 
	<Column ss:Index="5" ss:AutoFitWidth="0" ss:Width="140"/> 

	
_END;

fwrite($fh,$header) or die("could not write to file");
fwrite($fh,"\n");
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<?php
$data_timestamp='<Row ss:AutoFitHeight="0"><Cell><Data ss:Type="String">'.'Degree Audit: </Data></Cell></Row>';
fwrite($fh,$data_timestamp);
fwrite($fh,"\n");
fwrite($fh,"\n");
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$data_header=<<< _END
	<Row ss:AutoFitHeight="0">
		<Cell ss:StyleID="s64"><Data ss:Type="String">Semester</Data></Cell>
		<Cell ss:StyleID="s64"><Data ss:Type="String">Code</Data></Cell>
		<Cell ss:StyleID="s64"><Data ss:Type="String">Credit</Data></Cell>
		<Cell ss:StyleID="s64"><Data ss:Type="String">Grade</Data></Cell>
		<Cell ss:StyleID="s64"><Data ss:Type="String">Class</Data></Cell>
	</Row>
_END;
fwrite($fh,$data_header) or die("could not write to file");
fwrite($fh,"\n");
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<?php
	$beg_s='<Cell ss:StyleID="s62"><Data ss:Type="String">';
	$beg_i='<Cell ss:StyleID="s62"><Data ss:Type="Integer">';
	$end='</Data></Cell>';



		$output= '';
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">MATHEMATICS </Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		
		foreach($output_M as $opM)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $opM;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">SCIENCES</Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		foreach($output_S as $opS)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $opS;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">ENGINEERING </Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		foreach($output_EGR as $op)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $op;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">EE CORE </Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		foreach($output_EEC as $opM)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $opM;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">EE RESTRICTED ELECTIVES </Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		foreach($output_EER as $opM)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $opM;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">EE LAB ELECTIVES </Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		foreach($output_EEL as $opM)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $opM;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">LECTURE ELECTIVES </Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		foreach($output_LE as $opM)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $opM;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">LIBERAL ARTS </Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		foreach($output_LA as $opM)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $opM;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">ENGLISH </Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		foreach($output_ENL as $opM)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $opM;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}
		$data_timestamp='<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s64"><Data ss:Type="String">OTHERS</Data></Cell></Row>';
		fwrite($fh,$data_timestamp);
		fwrite($fh,"\n");
		fwrite($fh,"\n");
		foreach($output_Oth as $opM)
		{
			fwrite($fh,'<Row ss:AutoFitHeight="0">');
			fwrite($fh,"\n");
			$output = $opM;	
			fwrite($fh,$output) or die("could not write to file");
			fwrite($fh,"\n");
			fwrite($fh,'</Row>');
			fwrite($fh,"\n");
			fwrite($fh,"\n");
		}

///////////////////////////
$footer=<<< _END
  	</Table>  
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <Unsynced/>
   <PageLayoutZoom>0</PageLayoutZoom>
   <Selected/>
   
   <FreezePanes/>
   <FrozenNoSplit/>
   <SplitHorizontal>2</SplitHorizontal>
   <TopRowBottomPane>2</TopRowBottomPane>
   <ActivePane>2</ActivePane>
   <Panes>
    <Pane>
     <Number>3</Number>
    </Pane>
    <Pane>
     <Number>2</Number>
    </Pane>
   </Panes>
   
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
</Workbook>
_END;
fwrite($fh,$footer) or die("could not write to file");
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//fclose($fh);

?>







