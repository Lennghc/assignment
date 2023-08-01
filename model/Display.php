<?php

class Display
{
	public function createTable($result, $actions = false)
	{
		$action = isset($_GET['op']) ? $_GET['op'] : 'customer';
		$html = "";

		if ($result->rowCount() != 0) {
			$html .= "<div class='table-responsive'>";
			$html .= "<table class='table align-middle table-striped'>";

			$headerGenerated = false;
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				if (!$headerGenerated) {
					$html .= "<tr>";
					foreach ($row as $key => $value) {
						$html .= "<th scope='col'>{$key}</th>";
					}
					$html .= "<th scope='col'></th>";
					$html .= "</tr>";
					$headerGenerated = true;
				}

				$html .= "<tr scope='row'>";
				foreach ($row as $value) {
					$html .= "<td>" . (empty($value) ? '<i class="text-black fa fa-ban" aria-hidden="true"></i>' : $value) . "</td>";
				}

				$html .= "<td style='display: flex;'>";
				if ($actions) {
					$html .= $this->generateActionDropdown($action, $row['id']);
				} else {
					$html .= "<a href='index.php?con=game&op=delete&user={$_GET['id']}&id={$row['customergameid']}' class='btn btn-danger'>X</a>";
				}
				$html .= "</td>";
				$html .= "</tr>";
			}

			$html .= "</table>";
			$html .= "</div>";
		} else {
			$html .= "<h4>Geen data</h4>";
		}

		return $html;
	}

	private function generateActionDropdown($action, $id)
	{
		$html = '<div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Opties
                </button>
                <ul class="dropdown-menu">';
		$html .= "<li><a class='dropdown-item' href='index.php?con={$action}&op=update&id={$id}'>Wijzigen</a></li>
                  <li><a class='dropdown-item' href='index.php?con=game&op=update&id={$id}'>Game koppelen</a></li>
                  <li><a class='dropdown-item' href='index.php?con=customer&op=games&id={$id}'>Verstuur email</a></li>";
		$html .= '</ul>
                </div>';

		return $html;
	}

	public function createCountryOptions($result, $selectedCountryId = false)
	{
		$html = "";
		$html .= "<label for='optionCountry'>Land</label>";
		$html .= "<select class='form-select' name='country' id='optionCountry'>";
		if ($result->rowCount() != 0) {
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$isSelected = ($selectedCountryId == $row['id']) ? 'selected' : '';
				$html .= "<option {$isSelected} value={$row['id']}>{$row['name']}</option>";
			}
		}
		$html .= "</select>";

		return $html;
	}

	public function createGameOptions($result)
	{
		$html = "";
		$html .= "<label for='optionGame'></label>";
		$html .= "<select class='form-select' name='game' id='optionGame'>";
		if ($result->rowCount() != 0) {
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$html .= "<option value={$row['id']}>{$row['Naam']} ({$row['Platform']})</option>";
			}
		}
		$html .= "</select>";

		return $html;
	}
}
