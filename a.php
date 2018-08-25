<?php
	$file = "data.csv";
	$handle = fopen($file, "r");
	while ($data = fgetcsv($handle, 1000, ",")) {
		if($row !== 0)
		{
			$dados      = explode(";", $data[0]);
			$VALOR_1        = utf8_encode($dados[1]);
			$VALOR_2        = $dados[2];
			$VALOR_3        = $dados[3];
			$VALOR_4        = $dados[4];
			$VALOR_6        = $dados[11];

				$insert = "
					INSERT INTO
						dados
					VALUES
					(
						NULL,
						'$VALOR_1',
						'$VALOR_2',
						'$VALOR_3',
						'$VALOR_4',
						'$VALOR_6',
					)
				";
				//$insert_now = mysqli_query($mysqli, $insert);
		}
	}