// Entities/Cosa.php
namespace Entities;

/**
 * @Entity
 * @Table(name="cosas")
 */
class Cosa
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string", length=255)
     */
    private $cosa;

    /**
     * @OneToMany(targetEntity="Tag", mappedBy="cosa", cascade={"persist"})
     */
    private $tags;

    // Other properties...

    // Constructor
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    // Getter and setter methods...

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of cosa
     */
    public function getCosa()
    {
        return $this->cosa;
    }

    /**
     * Set the value of cosa
     */
    public function setCosa($cosa)
    {
        $this->cosa = $cosa;
    }

    /**
     * Get the value of tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add a tag to the collection
     */
    public function addTag(Tag $tag)
    {
        $this->tags[] = $tag;
        $tag->setCosa($this); // Important to set the inverse side of the relationship
    }

    /**
     * Remove a tag from the collection
     */
    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
        $tag->setCosa(null); // Important to set the inverse side of the relationship
    }
}
