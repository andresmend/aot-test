<!DOCTYPE html>
<?php 
    use Stichoza\GoogleTranslate\GoogleTranslate;

    if(isset($_GET['lang'])) {
        if ( !empty($_GET['lang'])) {
            $language = $_GET['lang'];
        } else {
            $language = 'en';
        }
    } else {
        $language = 'en';
    }

    $tr = new GoogleTranslate($language);
?>

<html lang="<?php echo ($language);?>">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $tr->translate('Add Question');?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    </head>
    
    <body>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-12 col-md-8">
                    <h1><?php echo $tr->translate('Please, write your question.'); ?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-8">
                    <form id="addQuestion" class="addQuestion mt-5" name="addQuestion" method="post" autocomplete="off" novalidate>		
                            
                        <div class="row mb-3">
                            <div class="col-12">                                          
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="question" placeholder="<?php echo $tr->translate('Question'); ?>" name="question" aria-required="true" aria-invalid="false" value="" required/>
                                    <label class="form-control-placeholder" for="question"><?php echo $tr->translate('Question'); ?></label>
                                    <div class="invalid-feedback">
                                        <?php echo $tr->translate('Please, write your question.'); ?>
                                    </div>
                                    <input type="hidden" name="dateadded" value="<?php $date = date("Y-m-d H:i:s"); echo $date; ?>">                    		   			
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">                                          
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="choice_one" placeholder="<?php echo $tr->translate('Choice 1'); ?>" name="choice_one" aria-required="true" aria-invalid="false" value="" required/>
                                    <label class="form-control-placeholder" for="choice_one"><?php echo $tr->translate('Choice 1'); ?></label>
                                    <div class="invalid-feedback">
                                        <?php echo $tr->translate('Please, write your choice 1.'); ?>
                                    </div>                    		   			
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">                                          
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="choice_two" placeholder="<?php echo $tr->translate('Choice 2'); ?>" name="choice_two" aria-required="true" aria-invalid="false" value="" required/>
                                    <label class="form-control-placeholder" for="choice_two"><?php echo $tr->translate('Choice 2'); ?></label>
                                    <div class="invalid-feedback">
                                        <?php echo $tr->translate('Please, write your choice 2.'); ?>
                                    </div>                    		   			
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">                                          
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="choice_three" placeholder="<?php echo $tr->translate('Choice 3'); ?>" name="choice_three" aria-required="true" aria-invalid="false" value="" required/>
                                    <label class="form-control-placeholder" for="choice_three"><?php echo $tr->translate('Choice 3'); ?></label>
                                    <div class="invalid-feedback">
                                        <?php echo $tr->translate('Please, write your choice 3.'); ?>
                                    </div>                    		   			
                                </div>
                            </div>
                        </div>

                        <div class="row">																					
                            <div class="col-12">
                                <div class=" text-end">
                                    
                                    <button class="btn btn-primary" type="submit"><?php echo $tr->translate('Send'); ?></button>
                                </div>
                            </div>
                        </div>

                    </form>                  
                </div>
            </div>
        </div>
        <script>
            (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.addQuestion')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
            })()
        </script>
    </body>
</html>