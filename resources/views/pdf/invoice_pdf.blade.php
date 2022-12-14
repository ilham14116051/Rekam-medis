<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE</title>

	<head>
		<meta charset="utf-8" />
		<title></title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 2px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
				padding-top: 0px;
				padding-bottom: 0px;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 4px;
				/* border: 1px solid black; */
				margin: 0px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #eee;
				font-weight: bold;
			}

			.invoice-box table tr.information td {
				padding-bottom: 2px;
			}

			.invoice-box table tr.information td {
				border-bottom: 1px solid #eee;
				
			}

			.invoice-box table tr.information.last td {
				border-bottom: 1px solid #eee;
				
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}

			/* td{
				border : 1px solid #555;
			} */
		</style>

	</head>
	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top" >
            
						<table >
							<tr >
								<td class="title">
                  <!--  <h3>Lampung Pet Clinic</h3> -->
                  
									<img src="{{storage_path('app/public/lampungpet.png')}}" style="width: 146px; " />
                
								</td>
									<td class="title" style="width: 610px;">
									<!--  <h3>Lampung Pet Clinic</h3> -->
									<p  style="font-size: 20px; padding-top: 15px; "><strong>Dokter Praktek Hewan</strong><br>Lampung pet clinic</p>
									<!-- <p style="font-size: 15px; padding: 2px;"><strong>Lampung Pet Clinic</strong></p> -->
								</td>
							</tr>
						</table>
				</tr>
				
				<tr class="information">
					<td colspan="2">
						<table style="border-bottom: 1px solid #555; border-top: 1px solid #555;">
							<tr >
								<td style="width: 125px; text-align: left;  ">
									
                                    {{$inv->invoice}} <br />
									Tanggal <br />
									Nama Pasien<br/>
                  					
								</td>
								<td style="width: 200px; text-align: left;">
									
                                    <br/>
									: {{$inv->tgl_transaction}}<br/>
									: {{$pasien->nm_hewan}}<br/>
								
								</td>
                				<td style="width: 95px; text-align: left;">
									Nama Pemilik <br />
									Alamat  <br />
									No Hp 
								</td>

                                <td style="width: 95px; text-align: left;">
									
                                    : {{$pasien->nm_pemilik}}<br/>
                                    : {{$pasien->address}}<br/>
                                    : {{$pasien->phone}}<br/>

								</td>
								
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2" style="text-align: left;">
						<table >
							

						</table>

					</td>
					
					
					
				</tr>

				

      
			</table>
		</div>
    
	
</body>
</html>