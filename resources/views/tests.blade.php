@extends('layouts.app') 
@section('content')
<div class="container" style="margin:150px 150px auto 50px;">
        <form>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationServer01">First name</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationServer02">Last name</label>
                    <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationServerUsername">Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                      </div>
                      <input type="text" class="form-control is-invalid" id="validationServerUsername" placeholder="Username" aria-describedby="inputGroupPrepend3" required>
                      <div class="invalid-feedback">
                        Please choose a username.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationServer03">City</label>
                    <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationServer04">State</label>
                    <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
                    <div class="invalid-feedback">
                      Please provide a valid state.
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationServer05">Zip</label>
                    <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
                    <div class="invalid-feedback">
                      Please provide a valid zip.
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                    <label class="form-check-label" for="invalidCheck3">
                      Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
                </div>
<div class="was-validated">
                <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                        <label class="custom-control-label" for="customControlValidation1">Check this custom checkbox</label>
                      </div>
                    </div>
                    

                <button class="btn btn-primary" type="submit">Submit form</button>
              </form>

              <form class="was-validated">

                            
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                      <label class="custom-control-label" for="customControlValidation2">Toggle this custom radio</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                      <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
                      <label class="custom-control-label" for="customControlValidation3">Or toggle this other custom radio</label>
                      <div class="invalid-feedback">More example invalid feedback text</div>
                    </div>
                  
                    <div class="form-group">
                      <select class="custom-select" required>
                        <option value="">Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                  
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                      <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                      <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                  </form>
      </div>
   
  @stop