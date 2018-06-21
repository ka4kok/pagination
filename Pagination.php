<?php

class Pagination {

    public function getStart($page, $limit) {
        return ($page - 1) * $limit;
    }

    public function countPage($allUsers, $limit) {
        return ceil($allUsers / $limit);
    }

    public function makePagination($page, $maxPage) {
        $pagination = '';
        $prev = $page - 1;
        $next = $page + 1;

        if ($prev < 1) {
            $prev = 1;
        }

        if ($next > $maxPage) {
            $next = $maxPage;
        }

        if ( $page == 1) {
            $pagination .= '<span>Первая</span>';
            $pagination .= '<span>Предыдущая</span>';
        } else {
            $pagination .= '<a href="index.php?page=1"><span>Первая</span></a>';
            $pagination .= '<a href="index.php?page='.$prev.'"><span>Предыдущая</span></a>';
        }

        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $page) {
            $pagination .= '<span> '.$i.' </span>';
            }else {
                $pagination .= '<a href="index.php?page='.$i.'"><span>'.$i.'</span></a>';
            }
        }

        if ( $page == $maxPage) {
            $pagination .= '<span>Следующая</span>';
            $pagination .= '<span>Последняя</span>';
        } else {
            $pagination .= '<a href="index.php?page='.$next.'"><span>Следующая</span></a>';
            $pagination .= '<a href="index.php?page='.$maxPage.'"><span>Последняя</span></a>';
        }

        echo $pagination;
    }
}