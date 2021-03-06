
<style type="text/css">
	
	.box-scroll {
		overflow: auto;
		white-space: nowrap;	  
		display:block;
	}
	#chartjs-tooltip {
			opacity: 1;
			position: absolute;
			background:rgba(255,255,255,.6);
			color: #585656;
			font-weight:600;
			border-radius: 3px;
			-webkit-transition: all .1s ease;
			transition: all .1s ease;
			pointer-events: none;
			-webkit-transform: translate(-50%, 0);
			transform: translate(-50%, 0);
	}

	.chartjs-tooltip-key {
		display: inline-block;
		width: 10px;
		height: 10px;
		margin-right: 10px;
	}
	
	
</style>

<?php
$tanggal = date('Y-m');
$txt_periode_arr = explode('-', $tanggal);
	if(is_array($txt_periode_arr)) {
		$txt_periode = $txt_periode_arr[1] . ' ' . $txt_periode_arr[0];
	}
$month_now = date('n');
$year_now = date('Y');
?>

<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong id="ttl_ms">1. Monthly Sales</strong></h4>  
		<div class="box-tools pull-right">
            <div class="form-group">
				<label>Tahun :</label>
				<select  name="year_ms" id="year_ms" style="height:30px; padding:5px;">
					
					<?php if(!empty($years)){
					    $x=0;
						foreach($years as $b){
						    if($x == 0 && $b['years'] != $year_now) echo '<option value='.$year_now.'>'.$year_now.'</option>';
							echo '<option value='.$b['years'].'>'.$b['years'].'</option>';
							$x++;
						}
					}?>
										
				</select>  
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Pilih Bulan :</label>
				<select  name="month_ms" id="month_ms" style="height:30px; padding:5px;">
					<option value=''>All Month</option>
					<option value=1 <?php echo $month_now==1 ? 'selected' : '';?> >January</option>
					<option value=2 <?php echo $month_now==2 ? 'selected' : '';?> >February</option>
					<option value=3 <?php echo $month_now==3 ? 'selected' : '';?> >March</option>
					<option value=4 <?php echo $month_now==4 ? 'selected' : '';?> >April</option>
					<option value=5 <?php echo $month_now==5 ? 'selected' : '';?> >May</option>
					<option value=6 <?php echo $month_now==6 ? 'selected' : '';?> >June</option>
					<option value=7 <?php echo $month_now==7 ? 'selected' : '';?> >July</option>
					<option value=8 <?php echo $month_now==8 ? 'selected' : '';?> >August</option>
					<option value=9 <?php echo $month_now==9 ? 'selected' : '';?> >September</option>
					<option value=10 <?php echo $month_now==10 ? 'selected' : '';?> >October</option>
					<option value=11 <?php echo $month_now==11 ? 'selected' : '';?> >November</option>
					<option value=12 <?php echo $month_now==12 ? 'selected' : '';?> >December</option>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Satuan :</label>
				<select  name="satuan_ms" id="satuan_ms" style="height:30px; padding:5px;">
					<option value='qty'>Quantity</option>
					<option value='idr'>IDR</option>
					
										
				</select>           
			</div>
        </div>
	</div>
						
	<div class="box-body chart-responsive">
		<div class="overlay" id="container-loader-monthly_sales" style="margin-left:500px; ">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div class="chart" id="monthly_sales" style="height: 300px;"></div>
	</div>
						<!-- /.box-body -->
</div>
<br/>
<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong id="ttl_cr">2. Top 10 Shop Sales</strong></h4>    
		<div class="box-tools pull-right">
            <div class="form-group">
				<label>Pilih Brand :</label>
				<select  name="brand_tss" id="brand_tss" style="height:30px; padding:5px;">
					<option value=''>All Brand</option>
					<?php if(!empty($brand)){						
						foreach($brand as $b){
							echo '<option value='.$b['id_brand'].'>'.$b['nama_brand'].'</option>';
						}
					}?>
										
				</select>           
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Tahun :</label>
				<select  name="year_tss" id="year_tss" style="height:30px; padding:5px;">
					
					<?php if(!empty($years)){		
					    $x=0;
						foreach($years as $b){
						    if($x == 0 && $b['years'] != $year_now) echo '<option value='.$year_now.'>'.$year_now.'</option>';
							echo '<option value='.$b['years'].'>'.$b['years'].'</option>';
							$x++;
						}
					}?>
										
				</select>  
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Pilih Bulan :</label>
				<select  name="month_tss" id="month_tss" style="height:30px; padding:5px;">
					<option value=''>All Month</option>
					<option value=1 <?php echo $month_now==1 ? 'selected' : '';?> >January</option>
					<option value=2 <?php echo $month_now==2 ? 'selected' : '';?> >February</option>
					<option value=3 <?php echo $month_now==3 ? 'selected' : '';?> >March</option>
					<option value=4 <?php echo $month_now==4 ? 'selected' : '';?> >April</option>
					<option value=5 <?php echo $month_now==5 ? 'selected' : '';?> >May</option>
					<option value=6 <?php echo $month_now==6 ? 'selected' : '';?> >June</option>
					<option value=7 <?php echo $month_now==7 ? 'selected' : '';?> >July</option>
					<option value=8 <?php echo $month_now==8 ? 'selected' : '';?> >August</option>
					<option value=9 <?php echo $month_now==9 ? 'selected' : '';?> >September</option>
					<option value=10 <?php echo $month_now==10 ? 'selected' : '';?> >October</option>
					<option value=11 <?php echo $month_now==11 ? 'selected' : '';?> >November</option>
					<option value=12 <?php echo $month_now==12 ? 'selected' : '';?> >December</option>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Satuan :</label>
				<select  name="satuan_tss" id="satuan_tss" style="height:30px; padding:5px;">
					<option value='qty'>Quantity</option>
					<option value='idr'>IDR</option>										
				</select>           
			</div>
        </div>
	</div>
						
	<div class="box-body box-scroll">
		<div class="overlay" id="container-loader-tss" style="margin-left:500px;">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div class="chart" id="top_shop_sales" style="height: 300px; width:1600px;"></div>
	</div>
						<!-- /.box-body -->
</div>

<br/>
<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong>3. Stock value by warehouse</strong></h4>    
		<div class="box-tools pull-right">
            <div class="form-group">
				<label>Pilih Brand :</label>
				<select  name="brand_tss" id="brand_sv" style="height:30px; padding:5px;">
					<option value=''>All Brand</option>
					<?php if(!empty($brand)){						
						foreach($brand as $b){
							echo '<option value='.$b['id_brand'].'>'.$b['nama_brand'].'</option>';
						}
					}?>
										
				</select>   
								
			</div>
        </div>
	</div>
						
	<div class="box-body box-scroll">
		<div class="overlay" id="container-loader-sv" style="margin-left:500px;">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div class="chart" id="stock_value" style="height: 300px; width:2400px;"></div>
	</div>
						<!-- /.box-body -->
</div>

<br/>
<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong>4. Top 10 Shop Sales by Warehouse</strong></h4>    
		<div class="box-tools pull-right">
            <div class="form-group">
				<label>Pilih Brand :</label>
				<select  name="brand_tssw" id="brand_tssw" style="height:30px; padding:5px;">
					<option value=''>All Brand</option>
					<?php if(!empty($brand)){						
						foreach($brand as $b){
							echo '<option value='.$b['id_brand'].'>'.$b['nama_brand'].'</option>';
						}
					}?>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Tahun :</label>
				<select  name="year_tssw" id="year_tssw" style="height:30px; padding:5px;">
					
					<?php if(!empty($years)){	
					    $x=0;
						foreach($years as $b){
						    if($x == 0 && $b['years'] != $year_now) echo '<option value='.$year_now.'>'.$year_now.'</option>';
							echo '<option value='.$b['years'].'>'.$b['years'].'</option>';
							$x++;
						}
					}?>
										
				</select>  
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Pilih Bulan :</label>
				<select  name="month_tssw" id="month_tssw" style="height:30px; padding:5px;">
					<option value=''>All Month</option>
					<option value=1 <?php echo $month_now==1 ? 'selected' : '';?> >January</option>
					<option value=2 <?php echo $month_now==2 ? 'selected' : '';?> >February</option>
					<option value=3 <?php echo $month_now==3 ? 'selected' : '';?> >March</option>
					<option value=4 <?php echo $month_now==4 ? 'selected' : '';?> >April</option>
					<option value=5 <?php echo $month_now==5 ? 'selected' : '';?> >May</option>
					<option value=6 <?php echo $month_now==6 ? 'selected' : '';?> >June</option>
					<option value=7 <?php echo $month_now==7 ? 'selected' : '';?> >July</option>
					<option value=8 <?php echo $month_now==8 ? 'selected' : '';?> >August</option>
					<option value=9 <?php echo $month_now==9 ? 'selected' : '';?> >September</option>
					<option value=10 <?php echo $month_now==10 ? 'selected' : '';?> >October</option>
					<option value=11 <?php echo $month_now==11 ? 'selected' : '';?> >November</option>
					<option value=12 <?php echo $month_now==12 ? 'selected' : '';?> >December</option>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Satuan :</label>
				<select  name="satuan_w" id="satuan_w" style="height:30px; padding:5px;">
					<option value='qty'>Quantity</option>
					<option value='idr'>IDR</option>										
				</select> 
			</div>
        </div>
	</div>
						
	<div class="box-body box-scroll">
		<div class="overlay" id="container-loader-tssw" style="margin-left:500px;">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div class="chart" id="top_shop_sales_warehouse" style="height: 300px; width:1600px;"></div>
	</div>
						<!-- /.box-body -->
</div>

<br/>
<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong>5. Top 10 Shop Sales by SKU</strong></h4>    
		<div class="box-tools pull-right">
            <div class="form-group">
				<label>Pilih Brand :</label>
				<select  name="brand_tsss" id="brand_tsss" style="height:30px; padding:5px;">
					<option value=''>All Brand</option>
					<?php if(!empty($brand)){						
						foreach($brand as $b){
							echo '<option value='.$b['id_brand'].'>'.$b['nama_brand'].'</option>';
						}
					}?>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Tahun :</label>
				<select  name="year_tsss" id="year_tsss" style="height:30px; padding:5px;">
					
					<?php if(!empty($years)){	
					    $x=0;
						foreach($years as $b){
						    if($x == 0 && $b['years'] != $year_now) echo '<option value='.$year_now.'>'.$year_now.'</option>';
							echo '<option value='.$b['years'].'>'.$b['years'].'</option>';
							$x++;
						}
					}?>
										
				</select>  
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Pilih Bulan :</label>
				<select  name="month_tsss" id="month_tsss" style="height:30px; padding:5px;">
					<option value=''>All Month</option>
					<option value=1 <?php echo $month_now==1 ? 'selected' : '';?> >January</option>
					<option value=2 <?php echo $month_now==2 ? 'selected' : '';?> >February</option>
					<option value=3 <?php echo $month_now==3 ? 'selected' : '';?> >March</option>
					<option value=4 <?php echo $month_now==4 ? 'selected' : '';?> >April</option>
					<option value=5 <?php echo $month_now==5 ? 'selected' : '';?> >May</option>
					<option value=6 <?php echo $month_now==6 ? 'selected' : '';?> >June</option>
					<option value=7 <?php echo $month_now==7 ? 'selected' : '';?> >July</option>
					<option value=8 <?php echo $month_now==8 ? 'selected' : '';?> >August</option>
					<option value=9 <?php echo $month_now==9 ? 'selected' : '';?> >September</option>
					<option value=10 <?php echo $month_now==10 ? 'selected' : '';?> >October</option>
					<option value=11 <?php echo $month_now==11 ? 'selected' : '';?> >November</option>
					<option value=12 <?php echo $month_now==12 ? 'selected' : '';?> >December</option>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Satuan :</label>
				<select  name="satuan_tsss" id="satuan_tsss" style="height:30px; padding:5px;">
					<option value='qty'>Quantity</option>
					<option value='idr'>IDR</option>										
				</select> 
			</div>
        </div>
	</div>
						
	<div class="box-body box-scroll">
		<div class="overlay" id="container-loader-tsss" style="margin-left:500px;">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div class="chart" id="top_shop_sales_sku" style="height: 300px; width:1600px;"></div>
	</div>
						<!-- /.box-body -->
</div>

<br/>
<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong id="ttl_cr">6. Top 10 Stock</strong></h4>    
		<div class="box-tools pull-right">
            <div class="form-group">
				<label>Pilih Brand :</label>
				<select  name="brand_stock" id="brand_stock" style="height:30px; padding:5px;">
					<option value=''>All Brand</option>
					<?php if(!empty($brand)){						
						foreach($brand as $b){
							echo '<option value='.$b['id_brand'].'>'.$b['nama_brand'].'</option>';
						}
					}?>
										
				</select>           
			</div>
        </div>
	</div>
						
	<div class="box-body box-scroll">
		<div class="overlay" id="container-loader-stock" style="margin-left:500px;">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div class="chart" id="top_stock" style="height: 300px; width:1600px;"></div>
	</div>
						<!-- /.box-body -->
</div>
<br/>
<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong id="ttl_cr">7. Top 10 Shop Salesman</strong></h4>    
		<div class="box-tools pull-right">
            <div class="form-group">
				<label>Pilih Brand :</label>
				<select  name="brand_salesman" id="brand_salesman" style="height:30px; padding:5px;">
					<option value=''>All Brand</option>
					<?php if(!empty($brand)){						
						foreach($brand as $b){
							echo '<option value='.$b['id_brand'].'>'.$b['nama_brand'].'</option>';
						}
					}?>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Tahun :</label>
				<select  name="year_salesman" id="year_salesman" style="height:30px; padding:5px;">
					
					<?php if(!empty($years)){	
					    $x=0;
						foreach($years as $b){
						    if($x == 0 && $b['years'] != $year_now) echo '<option value='.$year_now.'>'.$year_now.'</option>';
							echo '<option value='.$b['years'].'>'.$b['years'].'</option>';
							$x++;
						}
					}?>
										
				</select>  
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Pilih Bulan :</label>
				<select  name="month_salesman" id="month_salesman" style="height:30px; padding:5px;">
					<option value=''>All Month</option>
					<option value=1 <?php echo $month_now==1 ? 'selected' : '';?> >January</option>
					<option value=2 <?php echo $month_now==2 ? 'selected' : '';?> >February</option>
					<option value=3 <?php echo $month_now==3 ? 'selected' : '';?> >March</option>
					<option value=4 <?php echo $month_now==4 ? 'selected' : '';?> >April</option>
					<option value=5 <?php echo $month_now==5 ? 'selected' : '';?> >May</option>
					<option value=6 <?php echo $month_now==6 ? 'selected' : '';?> >June</option>
					<option value=7 <?php echo $month_now==7 ? 'selected' : '';?> >July</option>
					<option value=8 <?php echo $month_now==8 ? 'selected' : '';?> >August</option>
					<option value=9 <?php echo $month_now==9 ? 'selected' : '';?> >September</option>
					<option value=10 <?php echo $month_now==10 ? 'selected' : '';?> >October</option>
					<option value=11 <?php echo $month_now==11 ? 'selected' : '';?> >November</option>
					<option value=12 <?php echo $month_now==12 ? 'selected' : '';?> >December</option>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Satuan :</label>
				<select  name="satuan_salesman" id="satuan_salesman" style="height:30px; padding:5px;">
					<option value='qty'>Quantity</option>
					<option value='idr'>IDR</option>										
				</select> 
			</div>
        </div>
	</div>
						
	<div class="box-body box-scroll">
		<div class="overlay" id="container-loader-salesman" style="margin-left:500px;">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div class="chart" id="top_shop_salesman" style="height: 300px; width:1600px;"></div>
	</div>
						<!-- /.box-body -->
</div>
<br/>
<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong>8. Total Order Completed vs Reject</strong></h4>  
		<div class="box-tools pull-right">
			<div class="form-group">
				<label>Tahun :</label>
				<select  name="year_cr" id="year_cr" style="height:30px; padding:5px;">
					
					<?php if(!empty($years)){
					    $x=0;
						foreach($years as $b){
						    if($x == 0 && $b['years'] != $year_now) echo '<option value='.$year_now.'>'.$year_now.'</option>';
							echo '<option value='.$b['years'].'>'.$b['years'].'</option>';
							$x++;
						}
					}?>
										
				</select>  
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Pilih Bulan :</label>
				<select  name="month_cr" id="month_cr" style="height:30px; padding:5px;">
					<option value=''>All Month</option>
					<option value=1 <?php echo $month_now==1 ? 'selected' : '';?> >January</option>
					<option value=2 <?php echo $month_now==2 ? 'selected' : '';?> >February</option>
					<option value=3 <?php echo $month_now==3 ? 'selected' : '';?> >March</option>
					<option value=4 <?php echo $month_now==4 ? 'selected' : '';?> >April</option>
					<option value=5 <?php echo $month_now==5 ? 'selected' : '';?> >May</option>
					<option value=6 <?php echo $month_now==6 ? 'selected' : '';?> >June</option>
					<option value=7 <?php echo $month_now==7 ? 'selected' : '';?> >July</option>
					<option value=8 <?php echo $month_now==8 ? 'selected' : '';?> >August</option>
					<option value=9 <?php echo $month_now==9 ? 'selected' : '';?> >September</option>
					<option value=10 <?php echo $month_now==10 ? 'selected' : '';?> >October</option>
					<option value=11 <?php echo $month_now==11 ? 'selected' : '';?> >November</option>
					<option value=12 <?php echo $month_now==12 ? 'selected' : '';?> >December</option>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Satuan :</label>
				<select  name="satuan_cr" id="satuan_cr" style="height:30px; padding:5px;">
					<option value='qty'>Quantity</option>
					<option value='idr'>IDR</option>										
				</select> 
			</div>
		</div>
	</div>
						
	<div class="box-body chart-responsive">
		<div class="overlay hide" id="container-loader-ocr" style="margin-left:500px; ">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div id="canvas-holder" style="width:60%; margin-left:200px;">
			<canvas id="ocr"></canvas>
			<div id="chartjs-tooltip">
				<table></table>
			</div>
		</div>
	</div>
						<!-- /.box-body -->
</div>
<br/>
<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong>9. Total Daily Sales</strong></h4> 
		<div class="box-tools pull-right">
            <div class="form-group">
				<label>Pilih Brand :</label>
				<select  name="brand_daily_sales" id="brand_daily_sales" style="height:30px; padding:5px;">
					<option value=''>All Brand</option>
					<?php if(!empty($brand)){						
						foreach($brand as $b){
							echo '<option value='.$b['id_brand'].'>'.$b['nama_brand'].'</option>';
						}
					}?>
										
				</select> 
				&nbsp;&nbsp;&nbsp; <b>||</b> &nbsp;&nbsp;&nbsp;
				<label>Satuan :</label>
				<select  name="satuan_daily_sales" id="satuan_daily_sales" style="height:30px; padding:5px;">
					<option value='qty'>Quantity</option>
					<option value='idr'>IDR</option>										
				</select> 	
			</div>
        </div>
	</div>
						
	<div class="box-body chart-responsive">
		<div class="overlay" id="container-loader-daily_sales" style="margin-left:500px; ">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div class="chart" id="daily_sales" style="height: 300px;"></div>
	</div>
						<!-- /.box-body -->
</div>
<br/>
<div class="box box-success">
	<div class="box-header with-border">
		<h4 class="box-title"><strong id="ttl_ms">10. No. of New Outlets</strong></h4> 
		<div class="box-tools pull-right">
            <div class="form-group">
				<label>Tahun :</label>
				<select  name="year" id="year" style="height:30px; padding:5px;">
					
					<?php if(!empty($years)){
					    $x=0;
						foreach($years as $b){
						    if($x == 0 && $b['years'] != $year_now) echo '<option value='.$year_now.'>'.$year_now.'</option>';
							echo '<option value='.$b['years'].'>'.$b['years'].'</option>';
							$x++;
						}
					}?>
										
				</select>           
			</div>
        </div>
	</div>
						
	<div class="box-body chart-responsive">
		<div class="overlay" id="container-loader-new_outlets" style="margin-left:500px; ">
			<img id="img-spinner" src="<?php echo base_url('assets/Preloader_1.gif');?>" style="position: absolute; top: 50%;" alt="Loading"/>
		</div>
		<div class="chart" id="new_outlets" style="height: 300px;"></div>
	</div>
						<!-- /.box-body -->
</div>

<link href="<?php echo base_url(); ?>assets/daterangepicker-master/daterangepicker.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/daterangepicker-master/moment.min.js"></script>



<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
	
<script>

load_monthly_sales();
load_top_shop_sales();
load_stock_value();
load_top_shop_sales_w();
load_top_shop_sales_sku();
load_top_stock();
load_top_shop_salesman();
load_ocr();
load_daily_sales();
load_new_outlets();
$('#satuan_ms').change(function(){
	load_monthly_sales();
});
$('#year_ms').change(function(){
	load_monthly_sales();
});
$('#month_ms').change(function(){
	load_monthly_sales();
});
$('#brand_tss').change(function(){
	load_top_shop_sales();
});
$('#satuan_tss').change(function(){
	load_top_shop_sales();
});
$('#month_tss').change(function(){
	load_top_shop_sales();
});
$('#year_tss').change(function(){
	load_top_shop_sales();
});
$('#brand_tssw').change(function(){
	load_top_shop_sales_w();
});
$('#month_tssw').change(function(){
	load_top_shop_sales_w();
});
$('#year_tssw').change(function(){
	load_top_shop_sales_w();
});
$('#satuan_w').change(function(){
	load_top_shop_sales_w();
});
$('#brand_tsss').change(function(){
	load_top_shop_sales_sku();
});
$('#satuan_tsss').change(function(){
	load_top_shop_sales_sku();
});
$('#year_tsss').change(function(){
	load_top_shop_sales_sku();
});
$('#month_tsss').change(function(){
	load_top_shop_sales_sku();
});
$('#brand_sv').change(function(){
	load_stock_value();
});

$('#brand_stock').change(function(){
	load_top_stock();
});
$('#brand_salesman').change(function(){
	load_top_shop_salesman();
});
$('#satuan_salesman').change(function(){
	load_top_shop_salesman();
});
$('#year_salesman').change(function(){
	load_top_shop_salesman();
});
$('#month_salesman').change(function(){
	load_top_shop_salesman();
});
$('#satuan_cr').change(function(){
	load_ocr();
});
$('#year_cr').change(function(){
	load_ocr();
});
$('#month_cr').change(function(){
	load_ocr();
});
$('#brand_daily_sales').change(function(){
	load_daily_sales();
});
$('#satuan_daily_sales').change(function(){
	load_daily_sales();
});
$('#year').change(function(){
	load_new_outlets();
});
function load_monthly_sales(){	
	$('#monthly_sales').empty();
	var bar = new Morris.Bar({
		element: 'monthly_sales',
		resize: true,
		data : [{
            "x" : null,
            "y" : null
        }],
		barColors: ['#19A519'],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Jumlah'],
		hideHover: 'auto',
		barSizeRatio:0.4,	
		barSize:50,	
		redraw: true,		
		fillOpacity: 0.6,
		behaveLikeLine: true,
		
    });	
	var satuan = $('#satuan_ms').val();
	var year = $('#year_ms').val();
	var month = $('#month_ms').val();
	$.ajax({
        type: "POST",
		data:{satuan:satuan,year:year,month:month},
        url:  '<?php echo site_url('home/load_monthly_sales');?>',        
		beforeSend  : function(){ $('#container-loader-monthly_sales').show(); },
        success: function(res){
			$('#container-loader-monthly_sales').hide();			
			bar.setData(JSON.parse(res));			
        }
    });	
}

function load_top_shop_sales(){	
	$('#top_shop_sales').empty();
	var bar = new Morris.Bar({
		element: 'top_shop_sales',
		resize: true,
		data : [{
            "x" : null,
            "y" : null
        }],
		barColors: ['#19A519'],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Jumlah'],
		hideHover: 'auto',
		barSize:50,
		barSizeRatio:0.4,	
		redraw: true,		
		fillOpacity: 0.6,
		behaveLikeLine: true,
		
    });	
	var brand = $('#brand_tss').val();	
	var year = $('#year_tss').val();
	var month = $('#month_tss').val();
	var satuan = $('#satuan_tss').val();	
	$.ajax({
        type: "POST",
		data:{brand:brand,satuan:satuan, month:month,year:year},
        url:  '<?php echo site_url('home/load_top_shop_sales');?>',        
		beforeSend  : function(){ $('#container-loader-tss').show(); },
        success: function(res){
			$('#container-loader-tss').hide();
			
			bar.setData(JSON.parse(res));			
        }
    });	
}

function load_top_shop_sales_w(){	
	$('#top_shop_sales_warehouse').empty();
	var bar = new Morris.Bar({
		element: 'top_shop_sales_warehouse',
		resize: true,
		data : [{
            "x" : null,
            "y" : null
        }],
		barColors: ['#19A519'],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Jumlah'],
		hideHover: 'auto',
		barSize:50,
		barSizeRatio:0.4,	
		redraw: true,		
		fillOpacity: 0.6,
		behaveLikeLine: true,
		
    });	
	var brand = $('#brand_tssw').val();
	var month = $('#month_tssw').val();
	var year = $('#year_tssw').val();
	var satuan = $('#satuan_w').val();
	$.ajax({
        type: "POST",
		data:{brand:brand,month:month,satuan:satuan,year:year},
        url:  '<?php echo site_url('home/load_top_shop_sales_w');?>',        
		beforeSend  : function(){ $('#container-loader-tssw').show(); },
        success: function(res){
			$('#container-loader-tssw').hide();
			
			bar.setData(JSON.parse(res));			
        }
    });	
}

function load_top_shop_sales_sku(){	
	$('#top_shop_sales_sku').empty();
	var bar = new Morris.Bar({
		element: 'top_shop_sales_sku',
		resize: true,
		data : [{
            "x" : null,
            "y" : null
        }],
		barColors: ['#19A519'],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Jumlah'],
		hideHover: 'auto',
		barSize:50,
		barSizeRatio:0.4,	
		redraw: true,		
		fillOpacity: 0.6,
		behaveLikeLine: true,
		
    });	
	var brand = $('#brand_tsss').val();
	var satuan = $('#satuan_tsss').val();	
	var year = $('#year_tsss').val();	
	var month = $('#month_tsss').val();	
	$.ajax({
        type: "POST",
		data:{brand:brand,satuan:satuan,year,month},
        url:  '<?php echo site_url('home/load_top_shop_sales_sku');?>',        
		beforeSend  : function(){ $('#container-loader-tsss').show(); },
        success: function(res){
			$('#container-loader-tsss').hide();
			
			bar.setData(JSON.parse(res));			
        }
    });	
}

function load_stock_value(){	
	$('#stock_value').empty();
	var bar = new Morris.Bar({
		element: 'stock_value',
		resize: true,
		data : [{
            "x" : null,
            "y" : null
        }],
		barColors: ['#19A519'],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Jumlah'],
		hideHover: 'auto',
		barSize:50,
		barSizeRatio:0.4,	
		redraw: true,		
		fillOpacity: 0.6,
		behaveLikeLine: true,
		
    });	
	var brand = $('#brand_sv').val();
	
	var satuan = '';
	$.ajax({
        type: "POST",
		data:{brand:brand,satuan:satuan},
        url:  '<?php echo site_url('home/load_stock_value');?>',        
		beforeSend  : function(){ $('#container-loader-sv').show(); },
        success: function(res){
			$('#container-loader-sv').hide();
			
			bar.setData(JSON.parse(res));			
        }
    });	
}

function load_top_stock(){	
	$('#top_stock').empty();
	var bar = new Morris.Bar({
		element: 'top_stock',
		resize: true,
		data : [{
            "x" : null,
            "y" : null
        }],
		barColors: ['#19A519'],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Jumlah'],
		hideHover: 'auto',
		barSize:50,
		barSizeRatio:0.4,	
		redraw: true,		
		fillOpacity: 0.6,
		behaveLikeLine: true,
		
    });	
	var brand = $('#brand_stock').val();
	$.ajax({
        type: "POST",
		data:{brand:brand},
        url:  '<?php echo site_url('home/load_top_stock');?>',        
		beforeSend  : function(){ $('#container-loader-stock').show(); },
        success: function(res){
			$('#container-loader-stock').hide();
			
			bar.setData(JSON.parse(res));			
        }
    });	
}
function load_top_shop_salesman(){	
	$('#top_shop_salesman').empty();
	var bar = new Morris.Bar({
		element: 'top_shop_salesman',
		resize: true,
		data : [{
            "x" : null,
            "y" : null
        }],
		barColors: ['#19A519'],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Jumlah'],
		hideHover: 'auto',
		barSize:50,
		barSizeRatio:0.4,	
		redraw: true,		
		fillOpacity: 0.6,
		behaveLikeLine: true,
		
    });	
	var brand = $('#brand_salesman').val();
	var satuan = $('#satuan_salesman').val();
	var year = $('#year_salesman').val();
	var month = $('#month_salesman').val();
	$.ajax({
        type: "POST",
		data:{brand:brand,satuan:satuan,year,month},
        url:  '<?php echo site_url('home/load_top_shop_salesman');?>',        
		beforeSend  : function(){ $('#container-loader-salesman').show(); },
        success: function(res){
			
			$('#container-loader-salesman').hide();
			
			bar.setData(JSON.parse(res));			
        }
    });	
}
function load_daily_sales(){
	$('#daily_sales').empty();
	var bar = new Morris.Bar({
		element: 'daily_sales',
		resize: true,
		data : [{
            "x" : null,
            "y" : null
        }],
		barColors: ['#19A519'],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Jumlah'],
		hideHover: 'auto',
		barSizeRatio:0.4,	
		barSize:50,	
		redraw: true,		
		fillOpacity: 0.6,
		behaveLikeLine: true,
		
    });	
	var brand = $('#brand_daily_sales').val();
	var satuan = $('#satuan_daily_sales').val();
	$.ajax({
        type: "POST",
		data:{brand:brand,satuan:satuan},
        url:  '<?php echo site_url('home/load_daily_sales');?>',        
		beforeSend  : function(){ $('#container-loader-daily_sales').show(); },
        success: function(res){
			$('#container-loader-daily_sales').hide();			
			bar.setData(JSON.parse(res));			
        }
    });	
}
function load_new_outlets(){
	$('#new_outlets').empty();
	var bar = new Morris.Bar({
		element: 'new_outlets',
		resize: true,
		data : [{
            "x" : null,
            "y" : null
        }],
		barColors: ['#19A519'],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Jumlah'],
		hideHover: 'auto',
		barSizeRatio:0.4,	
		barSize:50,	
		redraw: true,		
		fillOpacity: 0.6,
		behaveLikeLine: true,
		
    });	
	var year = $('#year').val();
	$.ajax({
        type: "POST",
		data:{year:year},
        url:  '<?php echo site_url('home/load_new_outlets');?>',        
		beforeSend  : function(){ $('#container-loader-new_outlets').show(); },
        success: function(res){			
			$('#container-loader-new_outlets').hide();			
			bar.setData(JSON.parse(res));			
        }
    });	
}
var ocr = document.getElementById("ocr");
Chart.defaults.global.defaultFontSize = 14;
Chart.defaults.global.tooltips.custom = function(tooltip) {
			// Tooltip Element
	var tooltipEl = document.getElementById('chartjs-tooltip');
			// Hide if no tooltip
	if (tooltip.opacity === 0) {
		tooltipEl.style.opacity = 0;
		return;
	}

			// Set caret Position
	tooltipEl.classList.remove('above', 'below', 'no-transform');
	if (tooltip.yAlign) {
		tooltipEl.classList.add(tooltip.yAlign);
	} else {
		tooltipEl.classList.add('no-transform');
	}

	function getBody(bodyItem) {
		return bodyItem.lines;
	}

			// Set Text
	if (tooltip.body) {
		var titleLines = tooltip.title || [];
		var bodyLines = tooltip.body.map(getBody);

		var innerHtml = '<thead>';

		titleLines.forEach(function(title) {
			innerHtml += '<tr><th>' + title + '</th></tr>';
		});
		innerHtml += '</thead><tbody>';

		bodyLines.forEach(function(body, i) {			
			var colors = tooltip.labelColors[i];			
			var style = 'background:' + colors.backgroundColor;
			style += '; border-color:' + colors.borderColor;
			style += '; border-width: 2px';
			var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
			innerHtml += '<tr><td>' + numberWithCommas(body) + '</td></tr>';
		});
		innerHtml += '</tbody>';
				
		var tableRoot = tooltipEl.querySelector('table');
				
		tableRoot.innerHTML = innerHtml;
	}

	var positionY = this._chart.canvas.offsetTop;
	var positionX = this._chart.canvas.offsetLeft;

			// Display, position, and set styles for font
	tooltipEl.style.opacity = 1;
	tooltipEl.style.left = positionX + tooltip.caretX + 'px';
	tooltipEl.style.top = positionY + tooltip.caretY + 'px';
	tooltipEl.style.fontFamily = tooltip._bodyFontFamily;
	tooltipEl.style.fontSize = tooltip.bodyFontSize;
	tooltipEl.style.fontStyle = tooltip._bodyFontStyle;
	tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
};
function load_ocr(){	
	var satuan = $('#satuan_cr').val();
	var year = $('#year_cr').val();
	var month = $('#month_cr').val();
	$.ajax({
		type: "POST",
		data:{satuan:satuan,year:year,month:month},
		url:  '<?php echo site_url('home/load_complete_reject');?>',        
		beforeSend  : function(){ $('#container-loader-ocr').show(); },
		success: function(res){			
			$('#container-loader-ocr').hide();
			var dt = JSON.parse(res);
			var lbl=[];
			var dtsets = [];
			for(var i in dt) {
				dtsets.push(dt[i]);
			}	
			var oilData = {
				labels: [
					"Complete",
					"Cancel"        
				],
				datasets: [{
					data: dtsets,
					backgroundColor: [
						"#8FF750",
						"rgb(255, 99, 132)"                              
					]
				}]
			};
			var chartOptions = {
				rotation: 150,
				responsive: true,  
				legend: {
					position: 'bottom'
				},
				animation: {
					animateRotate: false,
					animateScale: true
				},
				tooltips: {
					enabled: false,
				}
			};
			var pieChart = new Chart(ocr, {
			  type: 'pie',
			  data: oilData,
			  options: chartOptions
			});	
		}
	});	
}
function numberWithCommas(x) {
	console.log(x[0].Complete);
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function formatIndo(value){
	console.log(value);
	return value.toLocaleString('id-ID');
}
</script>
