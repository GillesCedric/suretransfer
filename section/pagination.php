<div>																						
								<ul class="nav nav-pills nav-right">
									<li>
										<form class="form-inline">
											<label>Nombre de transactions par Page </label>
											<input type="hidden" name="" 
												value="<?php //echo $idc ?>">
											<input type="hidden" name="motCle" 
												value="<?php //echo $mc ?>">
											<input type="hidden" name="page" 
												value="<?php //echo $page ?>">
											<select name="size" class="form-control"
													onchange="this.form.submit()">
												<option <?php //if($size==10) echo "selected" ?>>10</option>
												<option <?php //if($size==15) echo "selected" ?>>15</option>
												<option <?php //if($size==20) echo "selected" ?>>20</option>
												<option <?php //if($size==25) echo "selected" ?>>25</option>
											</select>
										</form>
									</li>
									<?php //for($i=1;$i<=$nbrPage;$i++){ ?>
										<li class="<?php //if($i==$page) echo 'active' ?>">
											<a href="index.php?page=<?php// echo $i ?>
											&motCle=<?php //echo $mc ?>
											&id_categorie=<?php // echo $idc ?>
											&size=<?php //echo $size ?>">
												Page <?php //echo $i ?>
											</a>
										</li>
									<?php //} ?>	
								</ul>
							
						
                        </div>