<?php
abstract class Blueprint
{
	protected int $createdAt;
	protected int $updatedAt;

	public function __construct(int $createdAt, int $updatedAt)
	{
		$this->createdAt = $createdAt;
		$this->updatedAt = $updatedAt;
	}

	public abstract function insert();

	public abstract static function getAll();
}
