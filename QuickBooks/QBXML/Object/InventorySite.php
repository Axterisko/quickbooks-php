<?php
/**
 * QuickBooks InventorySite object container
 *
 * @author Adam Heinz <amh@metricwise.net>
 * @license LICENSE.txt
 *
 * @package QuickBooks
 * @subpackage Object
 */

/**
 * Base object class
 */
QuickBooks_Loader::load('/QuickBooks/QBXML/Object.php');

/**
 * QuickBooks Customer object class
 */
class QuickBooks_QBXML_Object_InventorySite extends QuickBooks_QBXML_Object
{
	/**
	 * Create a new QuickBooks_Object_InventorySite object
	 *
	 * @param array $arr
	 */
	public function __construct($arr = array())
	{
		parent::__construct($arr);
	}

    /**
     * Set the ListID for this item
     *
     * @param string $ListID
     * @return boolean
     */
    public function setListID($ListID)
    {
        return $this->set('ListID', $ListID);
    }

    /**
     * Get the ListID for this item
     *
     * @return string
     */
    public function getListID()
    {
        return $this->get('ListID');
    }

    /**
     * Set the name for this item
     *
     * @param string $name
     * @return boolean
     */
    public function setName($name)
    {
        return $this->set('Name', $name);
    }

    /**
     * Get the name for this item
     *
     * @return string
     */
    public function getName()
    {
        return $this->get('Name');
    }

    public function setFullName($fullname)
    {
        return $this->setFullNameType('FullName', 'Name', 'ParentSiteRef FullName', $fullname);
    }

    public function getFullName()
    {
        return $this->getFullNameType('FullName', 'Name', 'ParentSiteRef FullName');
    }

    /**
	 * @param string $lid
	 * @return boolean
	 */
	public function setParentSiteListID($lid)
	{
		return $this->set('ParentSiteRef ListID', $lid);
	}

	/**
	 * @param string $name
	 * @return boolean
	 */
	public function setParentSiteName($name)
	{
		return $this->set('ParentSiteRef FullName', $name);
	}

	/**
	 * Returns the sales rep object as an array
	 *
	 * @return array
	 */
	public function asArray($request, $nest = true)
	{
		$this->_cleanup();

		return parent::asArray($request, $nest);
	}

	/**
	 * Convert this object to a valid qbXML request
	 *
	 * @param string $request The type of request to convert this to (examples: CustomerAddRq, CustomerModRq, CustomerQueryRq)
	 * @param boolean $todo_for_empty_elements A constant, one of: QUICKBOOKS_XML_XML_COMPRESS, QUICKBOOKS_XML_XML_DROP, QUICKBOOKS_XML_XML_PRESERVE
	 * @param string $indent
	 * @param string $root
	 * @return string
	 */
	public function asQBXML($request, $version = null, $locale = null, $root = null)
	{
		$this->_cleanup();

		return parent::asQBXML($request, $version = null, $locale = null, $root);
	}

	/**
	 * Tell what type of object this is
	 *
	 * @return string
	 */
	public function object()
	{
		return QUICKBOOKS_OBJECT_SALESREP;
	}
}
