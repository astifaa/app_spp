 <form class="form-horizontal form-label-left" method="post" onsubmit="popup(this);" target="_blank" method="post" action="tampil_cetak.php" >
 	<div class="form-group">
 		<label>Dari</label>
 		<div class="input-group">
 			<div class="input-group-prepend">
 				<span class="input-group-text">
 					<i class="far fa-calendar-alt"></i>
 				</span>
 			</div>
 			<input type="date" name="dari" class="form-control float-right" id="reservation">
 		</div>
 		<!-- /.input group -->
 	</div>
 	<div class="form-group">
 		<label>Sampai</label>
 		<div class="input-group">
 			<div class="input-group-prepend">
 				<span class="input-group-text">
 					<i class="far fa-calendar-alt"></i>
 				</span>
 			</div>
 			<input type="date" name="sampai" class="form-control float-right" id="reservation">
 		</div>
 		<br/>
 		<div class="form-group">
 			<div class="col-md-6 col-sm-offset-3">
 				<button type="submit" name="cetak" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</button>
 				<button type="reset" class="btn btn-default btn-sm">Reset</button>
 			</div> 
 		</div>
 	</form> 
 </div> 
</div>
</div>
</form>