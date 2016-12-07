<?php

namespace SilexApi;

use Doctrine\DBAL\Connection;

class StateDao
{
	private $db;

	public function __construct(Connection $db)
	{
		$this->db = $db;
	}

	protected function getDb()
	{
		return $this->db;
	}
	public function find($id)
	{
		$sql = "SELECT * FROM state WHERE id=?";
		$row = $this->getDb()->fetchAssoc($sql, array($id));

		if ($row) {
			return $this->buildDomainObjects($row);
		} else {
			throw new \Exception("No state matching id ".$id);
		}
	}
	public function findByName($name)
	{
		$sql = "SELECT * FROM state WHERE name=?";
		$row = $this->getDb()->fetchAssoc($sql, array($id));

		if ($row) {
			return $this->buildDomainObjects($row);
		} else {
			throw new \Exception("No state matching name ".$name);
		}
	}
	public function save(State $state)
	{
		$stateData = array(
			'name' => $state->getName(),
			'state' => $state->getState(),
			'req' => $state->getReq(),
			'type' => $state->getType()
		);

		// TODO CHECK
		if ($state->getId()) {
			$this->getDb()->update('state', $stateData, array('id' => $state->getId()));
		} else {
			$this->getDb()->insert('state', $stateData);
			$id = $this->getDb()->lastInsertId();
			$state->setId($id);
		}
	}
	protected function buildDomainObjects($row)
	{
		$state = new State();
		$state->setId($row['id']);
		$state->setName($row['name']);
		$state->setState($row['state']);
		$state->setReq($row['req']);
		$state->setType($row['type']);


		return $state;
	}
}