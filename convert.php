<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $source_currency = $_POST['source_currency'];
    $target_currency = $_POST['target_currency'];
    $amount = $_POST['amount'];

    $formErrors = array();

    if (empty($source_currency)) {
        $formErrors[] = "Source currency <strong>required</strong>";
    } elseif (!array_key_exists($source_currency, $symbols)) {
        $formErrors[] = "Source currency <strong>invalid</strong>";
    }

    if (empty($target_currency)) {
        $formErrors[] = "Target currency <strong>required</strong>";
    } elseif (!array_key_exists($target_currency, $symbols)) {
        $formErrors[] = "Target currency <strong>invalid</strong>";
    }

    if (empty($amount)) {
        $formErrors[] = "Amount <strong>required</strong>";
    } elseif (!is_numeric($amount)) {
        $formErrors[] = "Amount must be <strong>numeric</strong>";
    }

    if (count($formErrors) > 0) {
        echo '<div class="row justify-content-center mt-2">
                    <div class="col-md-6">';
        foreach ($formErrors as $error) {
            echo '<div class="alert alert-danger alert-dismissible fade show">' . $error . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>';
        }
        echo '</div></div>';
    } else {
        // set API Endpoint, access key, required parameters
        $endpoint = 'convert';

        // initialize CURL:
        $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'&from='.$source_currency.'&to='.$target_currency.'&amount='.$amount.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // get the JSON data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $conversionResult = json_decode($json, true);

        // access the conversion result
        if ($conversionResult['success']) {
            include 'db/config.php';

            $statement = $conn->prepare('INSERT INTO conversions(source, target, amount, result, created_date, rate, created_time) 
                                VALUES (:fsource, :ftarget, :famount, :fresult, :fcreated_date, :frate, :fcreated_time)');

            $statement->execute([
                'fsource' => $conversionResult['query']['from'],
                'ftarget' => $conversionResult['query']['to'],
                'famount' => $conversionResult['query']['amount'],
                'fresult' => $conversionResult['result'],
                'fcreated_date' => $conversionResult['date'],
                'frate' => $conversionResult['info']['rate'],
                'fcreated_time' => $conversionResult['info']['timestamp'],
            ]);

            echo '<div class="row justify-content-center mt-2">
                    <div class="col-md-6">
                        <div class="alert alert-danger alert-dismissible fade show">
                            Data added successfully
                            <strong>'. $amount . ' ' . $source_currency . ' = ' . $conversionResult["result"] . ' ' . $target_currency .'</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                    </div>
                 </div>';

        } else {
            echo '<div class="row justify-content-center mt-2">
                    <div class="col-md-6">
                        <div class="alert alert-danger alert-dismissible fade show">
                            Access Restricted, please check docs
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                    </div>
                 </div>';
        }
    }

}