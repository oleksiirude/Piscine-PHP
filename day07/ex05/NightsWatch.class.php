<?php
	class NightsWatch {
		public function recruit($name)
		{
			if ($name instanceof IFighter)
				echo $name->fight();
		}
		public function fight() {
			return;
		}
	}
?>