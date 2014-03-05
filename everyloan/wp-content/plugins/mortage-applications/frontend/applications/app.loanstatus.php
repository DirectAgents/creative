<form name="loanstatusform" action="" method="post" onsubmit="return loanform_check()">
<table width="100%" border="0" class="table-form" style="width:100% !important;"><tr>
    <td>Your First Name:<b style="color:#FF0000;">*</b></td>
    <td><input type="text" name="name" id="name" class="input"/></td>
  </tr>
  <tr>
    <td>Your Last Name:<b style="color:#FF0000;">*</b></td>
    <td><input type="text" name="lastname" id="lastname" class="input"/></td>
  </tr>
  <tr>
    <td>Email:<b style="color:#FF0000;">*</b></td>
    <td><input type="text" name="email" id="email" class="input"/></td>
  </tr>
   <tr>
    <td>I want to know:</td>
    <td><select name="know" id="know">
<option value="">select</option>
<option value="Have you received my application?">Have you received my application?</option>
<option value="Will I qualify for the loan?">Will I qualify for the loan?</option>
<option value="When will my appraisal take place?">When will my appraisal take place?</option>
<option value="When will my loan be closed?">When will my loan be closed?</option>
<option value="Other -- Please specify below">Other -- Please specify below.</option>
</select></td>
  </tr>
  <tr>
    <td>Contact Number:</td>
    <td><input type="text" name="cnumber" id="cnumber" class="input"/></td>
  </tr>
   <tr>
    <td>Comments:</td>
    <td><textarea id="comments" name="comments" class="input"></textarea></td>
  </tr>
  <tr>
  <td></td>
    <td><input type="submit" name="submit" id="submit" class="submit" value="Apply Loan Status"/></td>
  </tr>
</table>
</form>