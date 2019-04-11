<?php
	class Lannister {
		public function sleepWith($name) {
			if (get_class($this) == 'Tyrion')
			{
				if (get_class($name) == 'Jaime')
					echo "Not even if I'm drunk !\n";
				else if (get_class($name) == 'Sansa')
					echo "Let's do this.\n";
				else if (get_class($name) == 'Cersei')
					echo "Not even if I'm drunk !\n";
			}
			else if (get_class($this) == 'Jaime')
			{
				if (get_class($name) == 'Tyrion')
					echo "Not even if I'm drunk !\n";
				else if (get_class($name) == 'Sansa')
					echo "Let's do this.\n";
				else if (get_class($name) == 'Cersei')
					echo "With pleasure, but only in a tower in Winterfell, then.\n";
			}
		}
	}
?>