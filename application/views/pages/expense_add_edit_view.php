<div class="ibox">
  <div class="ibox-title">
      <h5><?php echo ucfirst($this->lang_library->translate('Add Expense Category')); ?></h5>
      <div class="ibox-tools">
          <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
          </a>
     </div>
  </div>
<div class="ibox-content">
<div class="page-content">
            <div class="wrap">
              <h4 id="success" style="text-align:center;"></h4>
                    	
                    <form class="form-horizontal" role="form" action="<?php echo base_url('ExpenseCategories/add'); ?>" method="post" id="expense_add">

                        <input type="hidden" name="ID" value="<?php echo @$View['ID'];?>">
                         <div class="form-group">
                              <label  class="col-sm-3 control-label">Title : </label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?php echo @$View['title']; ?>">
                              </div>
                                <span id="title"></span>
                          </div>

                          

                          <div class="form-group">
                              <label for="price" class="col-sm-3 control-label">Description : </label>
                              <div class="col-sm-6">
                                <textarea type="text" class="form-control" name="description" placeholder="Description"><?php echo @$View['description']; ?></textarea>
                              </div>
                                <span id="description"></span>
                          </div>
                        </div>
                         
                           
                        	<div class="form_footer">
                        	<div class="row">
                            	<div class="col-md-6 text-center col-md-offset-3 ">
                                        <button type="submit" class="btn btn-primary"><?php echo isset($What) ? 'Update' : 'Add'; ?></button>
                                    </div>
                            	</div>

                            </form> 
                        

            </div>
        </div>
	</div>
	</div>
<!-- Custom and plugin javascript -->
<script src="<?php echo base_url("js/formSerialize.js"); ?>"></script>
<!-- Jquery Validate -->
<script src="<?php echo base_url("js/plugins/validate/jquery.validate.min.js"); ?>"></script>

<script type="text/javascript">
$.validator.setDefaults({ ignore: ":hidden:not(select)" });
  $(".chosen-select").chosen();
  $(document).ready(function() {
    $("#expense_add").postAjaxData(function(result){
      //alert(result);
       if(result === 1)
      {
        var type = "<?php echo isset($What) ? 'Updated' : 'Added'; ?>";
        toastr.success('Successfully '+type+'.');
        setTimeout(function(){
          window.location.href = "<?php echo current_url(); ?>";
        }, 3000);
      }
      else
      {
        if(typeof result === 'object')
        {
          mess = "";
          $.each(result,function(dom,err)
          {
            mess = mess+err+"\n";
            toastr.error(mess);
          });
        }
        else
        {
          toastr.error("Something went wrong!");
        }
      }
    });


$("#expense_add").validate({
                 rules: {
                     title: {
                         required: true,
                     }                 
                 }
             });
  });    
</script>