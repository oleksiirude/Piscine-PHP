<?php
	class UnholyFactory {

		private $arr = array();

		public function absorb($fighter) {
			$fighter = get_class($fighter);
			$fighter = strtolower($fighter);
			if ($fighter == "footsoldier")
				$fighter = "foot soldier";
			if ($fighter == "llama")
				echo "(Factory can't absorb this, it's not a fighter)\n";
			else
			{
				if (!array_key_exists($fighter, $this->arr))
				{
					$this->arr[$fighter] = $fighter;
					echo "(Factory absorbed a fighter of type $fighter)\n";
				}
				else
					echo "(Factory already absorbed a fighter of type $fighter)\n";
			}
		}
	}
?>