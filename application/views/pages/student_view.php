 <div class="row text-right">
    <?php if($this->session_library->get_session_data('Login_as') != 'DSSK10000009') { ?>
    <a href="<?php echo base_url('student/add')?>"><button class=" btn btn-outline btn-primary dim" type="button"><i class="fa fa-plus"></i></button></a>   
    <?php } ?>
 </div>
        <!-- <div class=""> -->
            <div class="row">
                <div class="ibox">
                        <div class="ibox-content">
                            <!-- <h2>Students</h2> -->
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="false"><i class="fa fa-star"></i> Active</a></li>
                                <li><a data-toggle="tab" href="#tab-2" aria-expanded="true"><i class="fa fa-archive"></i> Archive</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <br>
                                    <div class="input-group">
                                        <input type="text" placeholder="Search Student" id="search" class="input-sm form-control"> 
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Search</button> 
                                        </span>
                                    </div>

                                    <div class="clients-list">
                                        <div class="tab-content">
                                            <div class="full-height-scroll">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover" id="table">
                                                        <thead>
                                                            <tr>
                                                            <th>#</th>
                                                            <th></th>
                                                            <th>Student</th>
                                                            <th>Batch</th>
                                                            <th></th>
                                                            <th>School Name</th>
                                                            <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='act'>
                                                        <?php if (@$Team) {
                                                           foreach ($Team as $key => $value) {
                                                            if ($value['Active_Status']==='Active') {
                                                            $path=$this->str_function_library->call('fr>SS>path:ID=`'.$value['img_ID'].'`');
                                                        ?>
                                                        <tr>
                                                            <a href="<?php echo base_url('view/'.$value['ID']);?>">
                                                            <td><strong><?php echo $value['ID']; ?></strong></td>
                                                            <td class="client-avatar"><img alt="image" src="<?php echo base_url().$path; ?>"> </td>
                                                            <?php if($this->session_library->get_session_data('Login_as') == 'DSSK10000001') { ?>
                                                            <td><a href="<?php echo base_url('student/view/'.$value['ID']);?>" class="client-link"><?php echo ucfirst(@$value['Name']).' '.ucfirst(@$value['Middle_name'][0]).' '.ucfirst(@$value['Last_name']); ?></a></td>
                                                            <?php } else { ?>
                                                            <td><?php echo ucfirst(@$value['Name']).' '.ucfirst(@$value['Middle_name'][0]).' '.ucfirst(@$value['Last_name']); ?></td>
                                                            <?php } ?>
                                                            <td> <?php $batch_id = $this->str_function_library->call('fr>ADT>Batch:Student_ID=`'.@($value['ID']).'`');echo (($batch = $this->str_function_library->call('fr>BT>name:ID=`'.@($batch_id).'`'))=='-NA-' ) ? 'Private' : $batch;?></td>
                                                            <td class="contact-type"><i class="fa fa-graduation-cap"></i> </td>
                                                            <td> <?php echo $this->str_function_library->call('fr>CI>School:student_ID=`'.$value['ID'].'`'); ?></td>
                                                            <td class="client-status"><span class="label <?php echo ($value['admStatus']==='Inprocess')? 'label-warning' :'label-primary' ;?>"><?php echo $value['admStatus'];?></span></td>
                                                            <!-- <td> <i class="fa fa-pencil"></i></td> -->
                                                             </a>
                                                        </tr>
                                                       
                                                        <?php } 
                                                        }} else{ ?>
                                                        <tr>
                                                            <td class="client-avatar"><img alt="image" src="<?php echo base_url('img/user.jpg'); ?>"> </td>
                                                            <td colspan="5">No Student Present</td>
                                                        </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                    <div id="tab-2" class="tab-pane">
                                    <br>
                                        <div class="input-group">
                                            <input type="text" placeholder="Search Student" id="search" class="input-sm form-control"> 
                                            <span class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Search</button> 
                                            </span>
                                        </div>

                                        <div class="clients-list">
                                            <div class="tab-content">
                                                <div class="full-height-scroll">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="table">
                                                            <thead>
                                                                <tr>
                                                                <th>#</th>
                                                                <th></th>
                                                                <th>Student</th>
                                                                <th>Batch</th>
                                                                <th></th>
                                                                <th>School Name</th>
                                                                <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="arch">
                                                            <?php if (@$Team) {
                                                               foreach ($Team as $key => $value) {
                                                                  if ($value['Active_Status']==='Archive') {
                                                                $path=$this->str_function_library->call('fr>SS>path:ID=`'.$value['img_ID'].'`');
                                                            ?>
                                                            <tr>
                                                                <a href="<?php echo base_url('view/'.$value['ID']);?>">
                                                                <td><strong><?php echo $value['ID']; ?></strong></td>
                                                                <td class="client-avatar"><img alt="image" src="<?php echo base_url().$path; ?>"> </td>
                                                                <?php if($this->session_library->get_session_data('Login_as') == 'DSSK10000001') { ?>
                                                                <td><a href="<?php echo base_url('student/view/'.$value['ID']);?>" class="client-link"><?php echo ucfirst(@$value['Name']).' '.ucfirst(@$value['Middle_name'][0]).' '.ucfirst(@$value['Last_name']); ?></a></td>
                                                                <?php } else { ?>
                                                                <td><?php echo ucfirst(@$value['Name']).' '.ucfirst(@$value['Middle_name'][0]).' '.ucfirst(@$value['Last_name']); ?></td>
                                                                <?php } ?>
                                                                <td> <?php $batch_id = $this->str_function_library->call('fr>ADT>Batch:Student_ID=`'.@($value['ID']).'`');echo (($batch = $this->str_function_library->call('fr>BT>name:ID=`'.@($batch_id).'`'))=='-NA-' ) ? 'Private' : $batch;?></td>
                                                                <td class="contact-type"><i class="fa fa-graduation-cap"></i> </td>
                                                                <td> <?php echo $this->str_function_library->call('fr>CI>School:student_ID=`'.$value['ID'].'`'); ?></td>
                                                                <td class="client-status"><span class="label <?php echo ($value['admStatus']==='Inprocess')? 'label-warning' :'label-primary' ;?>"><?php echo $value['admStatus'];?></span></td>
                                                                <!-- <td> <i class="fa fa-pencil"></i></td> -->
                                                                 </a>
                                                            </tr>
                                                           
                                                            <?php } } }else{ ?>
                                                            <tr>
                                                                <td class="client-avatar"><img alt="image" src="<?php echo base_url('img/user.jpg'); ?>"> </td>
                                                                <td colspan="5">No Student Present</td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
          <!--       </div>
            </div> -->
        </div>

        <script type="text/javascript">
          $("#search").keyup(function(){
            _this = this;
              $.each($("#table tbody tr"), function() {
                  if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                     $(this).hide();
                  else
                     $(this).show();
              });
          });
          setTimeout(function() {
            if (!$.trim( $('#act').html() ).length) {
                $('#act').html('<tr><td class="client-avatar"><img alt="image" src="<?php echo base_url('img/user.jpg'); ?>"> </td><td colspan="5">No Active Student Present</td></tr>');
            }
            if (!$.trim( $('#arch').html() ).length) {
                 $('#arch').html('<tr><td class="client-avatar"><img alt="image" src="<?php echo base_url('img/user.jpg'); ?>"> </td><td colspan="5">No Archive Student Present</td></tr>');
            }
          },500);
          
        </script>
        <script src="<?php //echo base_url('js/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
        <script src="<?php echo base_url('js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>