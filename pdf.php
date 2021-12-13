<?php

require_once __DIR__ . '/vendor/autoload.php';

// Buffer the following html with PHP so we can store it to a variable later
$html = '
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MPDF</title>

        <!-- file css for style on report  -->
        <link rel="stylesheet" href="./index.css">
    </head>
      <body>
        <div class="container">
            <!-- so this row should be our header of report  -->
            <div class="row">
                <div class="header">
                    <div class="logo_description_report_header">
                        <img src="./images/logo.png" alt="" />
                        <div class="brand_company">
                            For testing report MPDF in বাংলা ভাষা
                        </div>
                        <div class="description">
                            <small>Testing purpose</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- body of report  -->
            <div class="row">
                <div class="body_report">
                    <div class="name_header">
                        <p>Name                 : Testing name</p>
                        <p>Age                  : 12 </p>
                        <p>Date of birth        : 10/11/1999</p>
                        <p>Test Date            : 10/11/1999 </p>
                        <p>School               : RUPP </p>
                        <p>Grade                : Y1 </p>
                    </div>
                    <div class="Header_title">
                        <strong>
                         Header of this
                                   </strong>
                    </div>
                    <div class="container_details">
                        <!-- it should be table of report  -->
                        <table>
                            <thead>
                                <tr>
                                    <td>
                                     Name
                                    </td>
                                    <td>
                                     Age
                                    </td>
                                    <td>
                                     Date of Birth
                                             </td>
                                    <td>
                                     Test Date
                                          </td>
                                    <td>
                                     School
                                    </td>
                                    <td>
                                     Grade
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                     testing1
                                    </td>
                                    <td>
                                     10
                                    </td>
                                    <td>
                                     10/11/1999
                                    </td>
                                    <td>
                                     10/11/1999
                                    </td>
                                    <td>
                                     RUPP
                                    </td>
                                    <td>
                                     Year1
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                     testing1
                                    </td>
                                    <td>
                                     10
                                    </td>
                                    <td>
                                     10/11/1999
                                    </td>
                                    <td>
                                     10/11/1999
                                    </td>
                                    <td>
                                     RUPP
                                    </td>
                                    <td>
                                     Year1
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                     testing1
                                    </td>
                                    <td>
                                     10
                                    </td>
                                    <td>
                                     10/11/1999
                                    </td>
                                    <td>
                                     10/11/1999
                                    </td>
                                    <td>
                                     RUPP
                                    </td>
                                    <td>
                                     Year1
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                     testing1
                                    </td>
                                    <td>
                                     10
                                    </td>
                                    <td>
                                     10/11/1999
                                    </td>
                                    <td>
                                     10/11/1999
                                    </td>
                                    <td>
                                     RUPP
                                    </td>
                                    <td>
                                     Year1
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- footer of report  -->
            <div class="row">
                <div class="address">
                           Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, animi!
                </div>
                <div class="tel">
                           012121212212
                </div>
            </div>
        </div>
    </body>
    </html>';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf( [
	'mode'         => 'utf-8',
	'default_font' => 'bangla',
	'fontdata' => $fontData + [
			'bangla' => [
				'R' => 'kalpurush.ttf'
			]
		],
] );
$mpdf->WriteHTML( $html );
$mpdf->Output();