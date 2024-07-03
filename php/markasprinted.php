<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$con = mysqli_connect("localhost", "root", "", "lab");
$doc_id = $_REQUEST['doc_id'];
$date = date('d/m/y');
$s = "SELECT * FROM document where doc_id=$doc_id";
$result = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($result);
$val = $row['print_status'];
$as_id = $_REQUEST['as_id'];

$st_id = $row['s_id'];
$sql = "SELECT * from student where s_id = $st_id";
$r = mysqli_query($con, $sql);
$record = mysqli_fetch_assoc($r);
$email = $record['email'];

$sub = $row['sub_id'];
$sql1 = "SELECT * from `subject` where sub_id = $sub";
$r1 = mysqli_query($con, $sql1);
$rec = mysqli_fetch_assoc($r1);
$sub_name = $rec['sub_name'];
$content = '<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
	<title></title>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
	<!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
	<!--<![endif]-->
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		.desktop_hide,
		.desktop_hide table {
			mso-hide: all;
			display: none;
			max-height: 0px;
			overflow: hidden;
		}

		@media (max-width:670px) {

			.desktop_hide table.icons-inner,
			.social_block.desktop_hide .social-table {
				display: inline-block !important;
			}

			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}

			.image_block img.big,
			.row-content {
				width: 100% !important;
			}

			.mobile_hide {
				display: none;
			}

			.stack .column {
				width: 100%;
				display: block;
			}

			.mobile_hide {
				min-height: 0;
				max-height: 0;
				max-width: 0;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide,
			.desktop_hide table {
				display: table !important;
				max-height: none !important;
			}
		}
	</style>
</head>

<body style="background-color: #F5F5F5; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
		style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F5F5F5;" width="100%">
		<tbody>
			<tr>
				<td>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
						role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0"
										class="row-content stack" role="presentation"
										style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;"
										width="650">
										<tbody>
											<tr>
												<td class="column column-1"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
													width="100%">
													<div class="spacer_block"
														style="height:30px;line-height:30px;font-size:1px;"> </div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
						role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0"
										class="row-content stack" role="presentation"
										style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #D6E7F0; color: #000000; width: 650px;"
										width="650">
										<tbody>
											<tr>
												<td class="column column-1"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 25px; padding-right: 25px; vertical-align: top; padding-top: 5px; padding-bottom: 60px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
													width="100%">
													<table border="0" cellpadding="0" cellspacing="0"
														class="text_block block-2" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
														width="100%">
														<tr>
															<td class="pad"
																style="padding-left:15px;padding-right:10px;padding-top:20px;">
																<div style="font-family: sans-serif">
																	<div class=""
																		style="font-size: 12px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px; color: #052d3d; line-height: 1.5;">
																		<p
																			style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 75px;">
																			<span style="font-size:50px;"><strong><span
																						style="font-size:50px;"><span
																							style="font-size:38px;">LARA</span></span></strong></span>
																		</p>
																		<p
																			style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 51px;">
																			<span style="font-size:34px;"><strong><span
																						style="font-size:34px;"><span
																							style="color:#2190e3;font-size:34px;">Printing Done</span></span></strong></span>
																		</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="10" cellspacing="0"
														class="text_block block-3" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
														width="100%">
														<tr>
															<td class="pad">
																<div style="font-family: sans-serif">
																	<div class=""
																		style="font-size: 12px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
																		<p
																			style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;">
																			<span style="color:#000000;"><span
																					style="font-size:18px;">Printing
																					of your <strong>' .$sub_name. '</strong> assignment has been
																					finished. You can collect the record
																					from the lab. </span></span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3"
						role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0"
										class="row-content stack" role="presentation"
										style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;"
										width="650">
										<tbody>
											<tr>
												<td class="column column-1"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 20px; padding-bottom: 60px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
													width="100%">
													
													<table border="0" cellpadding="10" cellspacing="0"
														class="text_block block-2" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
														width="100%">
														<tr>
															<td class="pad">
																<div style="font-family: sans-serif">
																	<div class=""
																		style="font-size: 12px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px; color: #555555; line-height: 1.5;">
																		<p
																			style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;">
																			Master of computer applications</p>
																		<p
																			style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;">
																			Union Christian College, Aluva</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="10" cellspacing="0"
														class="divider_block block-3" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td class="pad">
																<div align="center" class="alignment">
																	<table border="0" cellpadding="0" cellspacing="0"
																		role="presentation"
																		style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
																		width="60%">
																		<tr>
																			<td class="divider_inner"
																				style="font-size: 1px; line-height: 1px; border-top: 1px dotted #C4C4C4;">
																				<span> </span></td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="10" cellspacing="0"
														class="text_block block-4" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
														width="100%">
														<tr>
															<td class="pad">
																<div style="font-family: sans-serif">
																	<div class=""
																		style="font-size: 12px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #4F4F4F; line-height: 1.2;">
																		<p
																			style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 14.399999999999999px;">
																			<span style="font-size:14px;"><a href="#"
																					rel="noopener"
																					style="text-decoration: none; color: #2190E3;"
																					target="_blank"><strong></strong></a><strong><a
																						href="https://mcaucc.edu.in/"
																						rel="noopener"
																						style="text-decoration: underline; color: #2190E3;"
																						target="_blank">Website</a></strong>
																				| 0484-2603633(office)</span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table><!-- End -->
</body>

</html>';

if ($val == 'not printed') {

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ericsantony123@gmail.com';
    $mail->Password = 'smnjgoudahkhjgvf';
    $mail->Port = 465;
    $mail->isHTML(true);
    $mail->setFrom('ericsantony123@gmail.com', 'LARA');
    $mail->addAddress($email);
    $mail->Subject = ('Record printing');
    $mail->Body = ($content);
    $mail->send();


    $sql = "UPDATE document SET print_status = 'printed' where doc_id=$doc_id";
    $sql1 = "INSERT INTO print_doc(doc_id,print_date,as_id) VALUES('$doc_id','$date','$as_id')";
    if (mysqli_query($con, $sql) and mysqli_query($con, $sql1)) {
        header("refresh:0,url=../pages/assistant/la_dash.php");
    } else {
        echo "<script>alert('Failed to change status')</script>";
        header("refresh:0,url=../Pages/assistant/la_dash.php");
    }
}
else
{
    $sql = "UPDATE document SET print_status = 'not printed' where doc_id=$doc_id";
    $sql1 = "DELETE FROM print_doc where doc_id=$doc_id";
    if (mysqli_query($con, $sql) and mysqli_query($con, $sql1)) {
        header("refresh:0,url=../pages/assistant/la_dash.php");
    } else {
        echo "<script>alert('Failed to change status')</script>";
        header("refresh:0,url=../Pages/assistant/la_dash.php");
    }
}