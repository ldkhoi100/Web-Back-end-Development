<?php include './Point2D.php';

class Point3D extends Point2D
{
    public float $z = 0.0;

    public function __construct()
    {
    }

    public function getZ()
    {
        return $this->z;
    }

    public function setZ($new_z)
    {
        $this->z = $new_z;
    }

    public function getXYZ()
    {
        return array($this->x, $this->y, $this->z);
    }

    public function setXYZ($new_x, $new_y, $new_z)
    {
        parent::setXY($new_x, $new_y);
        $this->z = $new_z;
    }

    public function toString()
    {
        return "\"(" . $this->x . "," . $this->y . "," . $this->z . ")\"";
    }
}