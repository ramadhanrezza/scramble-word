<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
    public function _get_result($select=null, $where=null, $join=null, $limit=null, $start=null, $sort=null) {
        if ($select !== null) {
            if (is_array($select)) {
                $this->generate_columns($select);
            } else {
                $this->db->select($select);
            }
        }
        if ($join !== null) { $this->generate_join($join); }
        if ($where !== null) { $this->generate_where($where); }
        if ($sort !== null) { $this->generate_sort($sort); }
        if ($limit !== null AND $start !== null) { $this->db->limit($limit, $start); }
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function _get_count($where=null, $join=null) {
        $this->db->from($this->_table_name);
        if ($join !== null) { $this->generate_join($join); }
        if ($where !== null) { $this->generate_where($where); }
        return $this->db->count_all_results();
    }

    public function generate_columns($columns) {
        $_column = '';
        foreach($columns as $idx=>$val) {
            foreach ($val['db_columns'] as $row) {
                $_column .= $val['db_name'] . ".$row as " . $val['db_name'] . "_$row, ";
            }
        }
        $this->db->select(substr($_column, 0, -2));
    }
    public function generate_join($join) {
        foreach ($join as $idx=>$val) {
            if (is_array($val)) {
                $this->db->join($idx, $val[1], $val[0]);
            } else {
                $this->db->join($idx, $val);
            }
        }
    }
    public function generate_where($where) {
        if (is_array($where)) {
            foreach ($where as $idx=>$val) {
                $this->db->where($idx, $val);
            }
        } else {
            $this->db->where($where);
        }
    }
    public function generate_sort($sort) {
        foreach ($sort as $idx=>$val) {
            $this->db->order_by($idx, $val);
        }

    }

    public function save($data, $return=null) {
        $this->db->insert($this->_table_name, $data);
        if ($return !== null) {
            return $this->db->insert_id();
        }
    }
    public function edit($data,$cond) {
        $this->db->update($this->_table_name,$data,$cond);
        if ($this->db->affected_rows() == '1') {
            return true;
        } else {
            return false;
        }
    }
    public function delete($cond) {
        if ($this->db->delete($this->_table_name, $cond)) {
            return true;
        } else {
            return false;
        }
    }
}