<?php

namespace SilexApi;

class State
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $state;

	/**
	 * @var string
	 */
	private $req;

	/**
	 * @var string
	 */
	private $type;
	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	/**
	 * @param int $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * @param string $state
	 */
	public function setState( $state ) {
		$this->state = $state;
	}

	/**
	 * @return string
	 */
	public function getReq() {
		return $this->req;
	}

	/**
	 * @param string $req
	 */
	public function setReq( $req ) {
		$this->req = $req;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	public function setType( $type ) {
		$this->type = $type;
	}
}