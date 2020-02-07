<?php include_once('Node.php');

class LinkList
{
    /* Link to the first node in the list */
    // Liên kết tới node đầu tiên trong danh sách
    private $firstNode;

    /* Link to the last node in the list */
    // Liên kết tới node cuối cùng trong danh sách
    private $lastNode;

    /* Total nodes in the list */
    // Số lượng node
    private $count;

    function __construct()
    {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->count = 0;
    }

    // Phương thức thêm node vào đầu Danh sách
    public function insertFirst($data)
    {
        // Khởi tạo một node mới
        $link = new Node($data);
        // Gán node kế sau của node mới khởi tạo là node đầu tiên của linklist
        $link->next = $this->firstNode;
        // Gán tiếp node đầu của danh sách là node mới khởi tạo.
        $this->firstNode = $link;

        /* If this is the first node inserted in the list
       then set the lastNode pointer to it */
        /* Kiểm tra, nếu node mới khởi tạo là node đầu tiên được thêm vào danh sách 
       thì đặt node đó là node cuối cùng của danh sách */
        if ($this->lastNode == NULL)
            $this->lastNode = $link;

        // Cuối cùng ta tăng kích thước của danh sách lên 1 đơn vị
        $this->count++;
    }

    // Phương thức thêm node vào phía sau Danh sách
    public function insertLast($data)
    {
        // kiểm tra nếu danh sách đã tồn tại node bên trong thì sẽ khởi tạo một node mới
        if ($this->firstNode != NULL) {
            $link = new Node($data);
            // Gán node kế tiếp phía sau của node cuối cùng hiện tại là node mới khởi tạo
            $this->lastNode->next = $link;
            // Vì là node cuối cùng nên node kế phía sau sẽ được gán giá trị NULL
            $link->next = NULL;
            // Gán node mới khởi tạo là node cuối cùng của danh sách
            $this->lastNode = $link;
            // Sau đó tăng kích thước của danh sách lên một đơn vị
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }

    //  Tạo phương thức lấy ra số lượng các node được thêm vào danh sách
    public function totalNodes()
    {
        return $this->count;
    }

    // Phương thức đọc ra Danh sách
    public function readList()
    {
        $listData = array();
        $current = $this->firstNode;

        while ($current != NULL) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }

    //empty linklist
    public function emptyList()
    {
        $this->firstNode = NULL;
    }

    //deleting a node from linklist $key is the value you want to delete
    public function deleteNode($key)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;

        while ($current->data != $key) {
            if ($current->next == NULL)
                return NULL;
            else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstNode) {
            if ($this->count == 1) {
                $this->lastNode = $this->firstNode;
            }
            $this->firstNode = $this->firstNode->next;
        } else {
            if ($this->lastNode == $current) {
                $this->lastNode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
    }

    public function insert($data, $key)
    {
        if ($key == 0) {
            $this->insertFirst($data);
        } else {
            $link = new Node($data);
            $current = $this->firstNode;
            $previous = $this->firstNode;

            for ($i = 0; $i < $key; $i++) {
                $previous = $current;
                $current = $current->next;
            }
            $link->next = $current;
            $previous->next = $link;
            $this->count++;
        }
    }

    public function find($key)
    {
        $current = $this->firstNode;
        while ($current->data != $key) {
            if ($current->next == NULL)
                return null;
            else
                $current = $current->next;
        }
        return $current;
    }

    public function readNode($nodePos)
    {
        if ($nodePos <= $this->count) {
            $current = $this->firstNode;
            $pos = 1;
            while ($pos != $nodePos) {
                if ($current->next == NULL) {
                    return null;
                } else {
                    $current = $current->next;
                }
                $pos++;
            }
            return $current->data;
        } else {
            return NULL;
        }
    }
}