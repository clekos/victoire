<?php
namespace Victoire\Bundle\QueryBundle\Entity\Traits;

/**
 * Query trait adds the query fields
 *
 */
trait QueryTrait
{
    /**
     * @var string
     *
     * @ORM\Column(name="query", type="text", nullable=true)
     */
    protected $query;

    /**
     *  Auto list mode: businessentity type
     * @var string
     * @ORM\Column(name="business_entity_name", type="string", nullable=true)
     *
     */
    protected $businessEntityName;

    /**
     * Get query
     *
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Set query
     *
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * Get businessEntity
     *
     * @return integer
     */
    public function getBusinessEntityName()
    {
        return $this->businessEntityName;
    }

    /**
     * Set businessEntityName
     *
     * @param String $businessEntityName The business entity name
     */
    public function setBusinessEntityName($businessEntityName)
    {
        $this->businessEntityName = $businessEntityName;
    }
}
