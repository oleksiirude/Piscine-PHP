<?php
	class UnholyFactory {

		private $arr = array();

		public function absorb($fighter) {
			if (!$fighter instanceof Fighter) {
				echo "(Factory can't absorb this, it's not a fighter)\n";
				return;
			}
			$name = get_class($fighter);
			$name = strtolower($name);
			{
				if (!array_key_exists($name, $this->arr))
				{
					$this->arr[$name] = $fighter;
					if ($name == "footsoldier")
						$name = "foot soldier";
					echo "(Factory absorbed a fighter of type $name)\n";
				}
				else {
					if ($name == "footsoldier")
						$name = "foot soldier";
					echo "(Factory already absorbed a fighter of type $name)\n";
				}
			}
		}

		public function fabricate($fighter) {
			if ($fighter == "foot soldier")
				$fighter = "footsoldier";
			if (!array_key_exists($fighter, $this->arr)) {
				echo "(Factory hasn't absorbed any fighter of type $fighter)\n";
				return (NULL);
			}
			else {
				foreach ($this->arr as $key => $elem)
					if ($key == $fighter) {
						break;
					}
				if ($fighter == "footsoldier")
					$fighter = "foot soldier";
				echo "(Factory fabricates a fighter of type $fighter)\n";
				return ($this->arr[$key]);
			}
		}
	}
?>