<?php

class World {
  public $grid = array (
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,1,1,0,0,0,0),
    array(0,0,0,1,1,0,0,0,0,0),
    array(0,0,0,0,1,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(0,0,0,0,0,0,0,0,0,0),
    array(1,1,0,0,0,0,0,0,0,0),
    array(1,1,0,0,0,0,0,0,0,0),
  );

  public function tick() {
    for ($row = 0; $row < 10; $row++) {
      for ($column = 0; $column < 10; $column++) {
        echo strval($this->grid[$row][$column]);
      }
      echo "\r\n";
    }

    $this->setGrid();
  }

  private function setGrid() {
    $replacementGrid = array (
      array(0,0,0,0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0,0,0,0),
    );

    for ($row = 0; $row < 10; $row++) {
      for ($column = 0; $column < 10; $column++) {
        $replacementGrid = $this->dingen($replacementGrid, $row, $column);
      }
    }

    $this->grid = $replacementGrid;
  }

  private function dingen($replacementGrid, $row, $column)
  {
    $currentState = $this->grid[$row][$column];
    $left = $this->getLeft($row, $column);
    $right = $this->getRight($row, $column);
    $topLeft = $this->getTopLeft($row, $column);
    $topRight = $this->getTopRight($row, $column);
    $top = $this->getTop($row, $column);
    $bottomLeft = $this->getBottomLeft ($row, $column);
    $bottomRight = $this->getBottomRight($row, $column);
    $bottom = $this->getBottom($row, $column);

    $aliveNeighbors = 0;
    if ($left != null) $aliveNeighbors++;
    if ($right != null) $aliveNeighbors++;
    if ($top != null) $aliveNeighbors++;
    if ($topLeft != null) $aliveNeighbors++;
    if ($topRight != null) $aliveNeighbors++;
    if ($bottom != null) $aliveNeighbors++;
    if ($bottomLeft != null) $aliveNeighbors++;
    if ($bottomRight != null) $aliveNeighbors++;

    $lameCheck = false;

    if ($currentState == 1){
      if ($aliveNeighbors < 2) 
      {
        $replacementGrid[$row][$column] = 0;
        $lameCheck = true;
      }
      else if ($aliveNeighbors > 3) 
      {
        $replacementGrid[$row][$column] = 0;
        $lameCheck = true;
      }
      else
      {
        $replacementGrid[$row][$column] = 1;
      }
    }
    else {
      if ($aliveNeighbors == 3) 
      {
        $replacementGrid[$row][$column] = 1;
        $lameCheck = true;
      }
      else
      {
        $replacementGrid[$row][$column] = 0;
      }
    }

      return $replacementGrid;
  }

  private function getLeft($row, $column) {
    if ($column != 0)
    {
      if ($this->grid[$row][$column - 1] == 1) {
        return 1;
      }
    }

    return null;
  }

  private function getRight($row, $column) {
    if ($column != 9)
    {
      if ($this->grid[$row][$column + 1] == 1){
        return 1;
      }
    }

    return null;
  }

  private function getTopLeft($row, $column) {
    if ($column != 0 && $row != 0)
    {
      if ($this->grid[$row - 1][$column - 1] == 1) {
        return 1;
      }
    }

    return null;
  }

  private function getTopRight($row, $column) {
    if ($column != 9 && $row != 0)
    {
      if ($this->grid[$row - 1][$column + 1] == 1) {
        return 1;
      }
    }

    return null;
  }

  private function getTop($row, $column) {
    if ($row != 0)
    {
      if ($this->grid[$row - 1][$column] == 1) {
        return 1;
      }
    }

    return null;
  }

  private function getBottomLeft($row, $column) {
    if ($column != 0 && $row != 9)
    {
      if ($this->grid[$row + 1][$column - 1] == 1) {
        return 1;
      }
    }

    return null;
  }

  private function getBottomRight($row, $column) {
    if ($column != 9 && $row != 9)
    {
      if ($this->grid[$row + 1][$column + 1] == 1) {
        return 1;
      }
    }

    return null;
  }

  private function getBottom($row, $column) {
    if ($row != 9)
    {
      if ($this->grid[$row + 1][$column] == 1) {
        return 1;
      }
    }

    return null;
  }

}

function clearScreen() {
  echo chr(27).chr(91).'H'.chr(27).chr(91).'J';
}

clearScreen();
$world = new World();

while (true)
{
  $world->tick();
  sleep(1);
  clearScreen();
}
?>
