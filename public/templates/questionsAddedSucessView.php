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
        <title><?php echo $tr->translate('Question added');?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    </head>
    
    <body>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-12 col-md-8">
                    <h1><?php echo $tr->translate('Question added!'); ?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="alert alert-info" role="alert">
                        <?php echo $tr->translate('Your question has been added.'); ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3 form-miembros">
                <div class="col-12 col-md-6">
                    <a href="/oat/public/questions" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true"><?php echo $tr->translate('Back to questions list'); ?></a>
                    <a href="/oat/public/addQuestions" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true"><?php echo $tr->translate('Back to add questions form'); ?></a>
                </div>
            </div>
        </div>
    </body>
</html>