

<div class="container">
    	<div class="row">
    		<div class="col-md-2 sm-hidden"></div>
            <div class="col-md-8 col-sm-12">
            	<form class="" action="seller.php?page=add" method="post">
                	<div class="form-group">
                        <label for="companyName">Address Label :</label>
                        <input type="text"
                        	   id="companyName" 
                        	   class="form-control" 
                               name="companyName" >
                	</div>
                	<div class="form-group">
                    	<label for="taxRoom">Select company : </label>
                        <select class="selectpicker form-control" name="taxRoom" data-live-search="true">
                        <option value="">Select Tax Department....</option>
       
                        </select>
                	</div>
                    <div class="form-group">
                        <label for="taxNo">Country :</label>
                       <select class="selectpicker form-control" name="taxRoom" data-live-search="true">
                        <option value="">Select Tax Department....</option>
       
                        </select>
                	</div>
                            <div class="form-group">
                        <label for="taxNo">City :</label>
                      <select class="selectpicker form-control" name="taxRoom" data-live-search="true">
                        <option value="">Select Tax Department....</option>
       
                        </select>
                	</div>
                                    <div class="form-group">
                        <label for="taxNo">Full address :</label>
                    <textarea name="fulladres">
                        
                        
                        </textarea>
                	</div>
                         <div class="form-group">
                        <label for="taxNo">Google address :</label>
             			<textarea name="googleAdres">
                        
                        
                        </textarea>
                	</div>
                    <input type="submit" class="btn btn-info" value="Save Address">
                    
                </form> 
            </div>
            <div class="col-md-2 sm-hidden"></div>
    	</div>
    </div>