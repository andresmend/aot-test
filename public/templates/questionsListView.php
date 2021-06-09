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
        <title><?php echo $tr->translate('Questions list');?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    </head>
    
    <body>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-12 col-md-8">
                    <h1><?php echo $tr->translate('Questions List'); ?></h1>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col-12 col-md-6">                 
                    <a href="/oat/public/addQuestions" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true"><?php echo $tr->translate('Add questions form'); ?></a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-8">

                    <p><?php if (isset($json_file) && !empty( $json_file ) ) {                               

                            $question_data = $json_file; 

                            for ($i=0;$i<count($question_data);$i++) {

                                $question_title = $question_data[$i]['text'];
                                echo '<h5>' . $tr->translate($question_title) . '</h5>';

                                $question_date = $question_data[$i]['createdAt'];
                                echo '<p><small>' . $question_date . '</small></p>';
                                echo '<ul>';

                                foreach($question_data[$i]['choices'] as $k=>$value) {
                                    $question_choices = '<li>' . $value["text"] . '</li>';
                                    echo $tr->translate($question_choices);
                                }
                                echo '</ul>';
                                
                            } 
                                   
                        } elseif (isset($csv_file) && !empty( $csv_file ) ) {                               

                            $question_data = $csv_file; 

                            for ($i=0;$i<count($question_data);$i++) {

                                $question_title = $question_data[$i]['Question text'];
                                $question_date = $question_data[$i]['Created At'];
                                $question_choice_one = $question_data[$i]['Choice 1'];
                                $question_choice_two = $question_data[$i]['Choice'];
                                $question_choice_three = $question_data[$i]['Choice 3'];
                                
                                $question_print = '';
                                $question_print .= '<h5>' . $tr->translate($question_title) . '</h5>';
                                $question_print .= '<p><small>' . $question_date . '</small></p>';
                                $question_print .= '<ul>';
                                $question_print .= '<li>' . $tr->translate($question_choice_one) . '</li>';
                                $question_print .= '<li>' . $tr->translate($question_choice_two) . '</li>';
                                $question_print .= '<li>' . $tr->translate($question_choice_three) . '</li>';
                                $question_print .= '</ul>';

                                echo $question_print;
                            }  
                        
                        }; ?>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>