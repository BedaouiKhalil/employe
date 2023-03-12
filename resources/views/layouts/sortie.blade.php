<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

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
				padding: 5px;
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
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
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


            @page {
              header: page-header;
             footer: page-footer;
             }
             
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
                                   COMENA
								</td>

								<td>
									Ref #: {{ $id }}<br />
								
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Nom <br />
									Prénom<br />
									Email
								</td>

								<td>
									{{ $nom }}<br />
									{{ $prenom }}<br />
									{{ $email }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>information personnelle</td>

					<td> #</td>
				</tr>

                
                <tr class="details">
					<td>Service</td>

					<td>{{ $service }}</td>
				</tr>
                <tr class="details">
					<td>Fonction</td>

					<td>{{ $fonction }}</td>
				</tr>
				<tr class="details">
					<td>Date naissance</td>

					<td>{{ $date_naissance->format('Y-m-d') }}</td>
				</tr>
                <tr class="details">
					<td>lieu naissance</td>

					<td>{{ $lieu_naissance }}</td>
				</tr>
                <tr class="details">
					<td>Date récrutement</td>

					<td>{{ $date_r->format('Y-m-d') }}</td>
				</tr>
                <tr class="details">
					<td>Situation social</td>

					<td>{{ $situation_soc }}</td>
				</tr>
                <tr class="details">
					<td>Diplome</td>

					<td>{{ $diplome }}</td>
				</tr>
              

				<tr class="heading">
					<td>Contrat</td>

					<td>#</td>
				</tr>

				<tr class="item">
					<td>Date début</td>

					<td>{{ $date_d->format('Y-m-d') }}</td>
				</tr>

				<tr class="item">
					<td>Date fin</td>

					<td>{{ $date_f->format('Y-m-d') }}</td>
				</tr>
                <tr class="item last">
					<td>type</td>

					<td>{{ $type }}</td>
				</tr>




				<tr class="total">
					<td></td>

					<td>Salaire: {{ $salaire }} DA</td>
				</tr>
			</table>
		</div>
	</body>
</html>