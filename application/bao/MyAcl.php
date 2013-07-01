<?php
class Application_BAO_MyAcl extends Zend_Acl
{

	public function __construct() {
		$this->acl = null;

		$acl = new Zend_Acl();

		$roleGuest = new Zend_Acl_Role('guest');
		$acl->addRole($roleGuest);
		$acl->addRole(new Zend_Acl_Role('staff'), $roleGuest);
		$acl->addRole(new Zend_Acl_Role('editor'), 'staff');
		$acl->addRole(new Zend_Acl_Role('administrator'));

		// Guest may only view content
		$acl->allow($roleGuest, null, 'view');

		// Staff inherits view privilege from guest, but also needs additional
		// privileges
		$acl->allow('staff', null, array('edit', 'submit', 'revise'));

		// Editor inherits view, edit, submit, and revise privileges from
		// staff, but also needs additional privileges
		$acl->allow('editor', null, array('publish', 'archive', 'delete'));

		// Administrator inherits nothing, but is allowed all privileges
		$acl->allow('administrator');
		$this->acl = $acl;
	}

}