<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Drawdatatable
{
	
	public function __construct() {      
	}

	/**
     * 
     * @param type $sTable
     * @param type $aColumns
     * @param type $sIndexColumn
     * @param type $joins
     * @param type $condition
     * @param type $orderby
     * @param type $groupby
     * @return type
     */
    public function drawdatatables($sTable, $aColumns, $sIndexColumn , $joins, $condition, $groupby=null, $sOrder=null) {   
		/* 
         * Paging
         */	 
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' ) {
				$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
				intval( $_POST['iDisplayLength'] );
		}
	
	
		/*
         * Ordering
         */
		if ( isset( $_POST['iSortCol_0'] ) ) {
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ ) {
                if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" ) {
                    $sOrder .= "".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]." ".
                                ($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
                }
            }

            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" ) {
                $sOrder = "";
            }		
		}	
	
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		$sWhere = "";
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" ) {
				$sWhere = "AND (";
				for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
					if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "false" ) {
					   //echo $_POST['bSearchable_'.$i].'<br>';
						$sWhere .= "".$aColumns[$i]." LIKE '%".$_POST['sSearch']."%' OR ";
					}
				}
				$sWhere = substr_replace( $sWhere, "", -3 );
				$sWhere .= ')';
                //echo '<pre>';print_r($sWhere);exit;
		} 	
	
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
				if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' ){
					if ( $sWhere == "" ) {
						$sWhere = "WHERE ";
					} else {
						$sWhere .= " AND ";
					}
					$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
				} 
		}
			
		/*
		 * SQL queries
		 * Get data to display
		 */
		$sQuery = "SELECT  ".str_replace(" , ", " ", implode(",", $aColumns))." FROM   $sTable $joins $condition $sWhere $groupby $sOrder $sLimit";
		    //echo $sQuery; exit; 
		$rResult = $this->query($sQuery)->result_array();
		//echo '<pre>';print_r($rResult); exit;
		
		/* Data set length after filtering filter filter */
		
		$sQuery = "SELECT COUNT(*) as filter
						FROM $sTable $joins $condition $sWhere ";		   
		
		$aResultFilterTotal = $this->query($sQuery)->result_array();
			
		//$iFilteredTotal = $aResultFilterTotal[0]['foundrows'];
		$iFilteredTotal = $aResultFilterTotal[0]['filter'];
		//print_r($iFilteredTotal); exit;
		/* Total data set length */
		//$sQuery = "SELECT SQL_NO_CACHE $sTable.id FROM $sTable"; 
		//$sQuery = "SELECT ".str_replace(" , ", " ", implode(",", $aColumns))."  FROM $sTable $joins $sWhere $sOrder $sLimit"; 
			//$aResultTotal = $this->get($sQuery);
			//$iTotal = $aResultTotal[0];
		$sQuery = "
			SELECT COUNT(*) as num
			FROM $sTable $joins $condition $sWhere
		"; 
		//echo $sQuery;exit();
			$aResultTotal = $this->query($sQuery)->result_array();
			//$iTotal = $aResultTotal[0];
			$iTotal = $aResultTotal[0]['num'];
		//$sQuery = "SELECT  ".str_replace(" , ", " ", implode(",", $aColumns))." FROM   $sTable $joins $sWhere $sOrder $sLimit";
		
		//$rResultTotal = mysql_query( $sQuery ) or die( 'MySQL Error: ' . mysql_errno() );
			
		/*
		 * Output  "iTotalDisplayRecords" => $iTotal,//$iFilteredTotal,
		 */
		$output = array(
			"sEcho" => intval($_POST['sEcho']),
			"iTotalRecords" => $iTotal,
			//"iTotalDisplayRecords" => $iTotal,//$iFilteredTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array() 
		);
	
        $columnId = array();
        foreach($aColumns as $col) {
            $data = explode(".",$col); 
            $columnId[] = $data[1];
        }
        
        
		//print_r($output); exit;
		foreach ( $rResult as $aRow ) 
		{    
			$row = array();
			for ( $i=0 ; $i<count($columnId) ; $i++ )
			{
						
						if ( $columnId[$i] == "version" )
				{
					/* Special output formatting for 'version' column */
					$row[] = ($aRow[ $columnId[$i] ]=="0") ? '-' : $aRow[ $columnId[$i] ];
								   
				}
						   
				else if ( $columnId[$i] != '' )
				{
					/* General output */                                
					$row[] = $aRow[$columnId[$i]];
				}
							
							//print_r($row); exit;
			}
			$output['aaData'][] = $row;
		}
		//print_r($output); exit;
		return $output;
	}
}
