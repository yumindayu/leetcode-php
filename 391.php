<?php
class Solution
{

    /**
     * @param Integer[][] $rectangles
     * @return Boolean
     */
    public function isRectangleCover($rectangles)
    {
        $bls = [];
        $brs = [];
        $tls = [];
        $trs = [];
        foreach ($rectangles as $rectangle) {
            $bl = sprintf('%d-%d', $rectangle[0], $rectangle[1]);
            $br = sprintf('%d-%d', $rectangle[2], $rectangle[1]);
            $tl = sprintf('%d-%d', $rectangle[0], $rectangle[3]);
            $tr = sprintf('%d-%d', $rectangle[2], $rectangle[3]);
            if (array_key_exists($bl, $bls) || array_key_exists($br, $brs) || array_key_exists($tl,
                $tls) || array_key_exists($tr, $trs)) {
                return false;
            }
            if (array_key_exists($bl, $brs)) {
                unset($brs[$bl]);
            } elseif (array_key_exists($bl, $tls)) {
                unset($tls[$bl]);
            } else {
                $bls[$bl] = 1;
            }
            if (array_key_exists($br, $bls)) {
                unset($bls[$br]);
            } elseif (array_key_exists($br, $trs)) {
                unset($trs[$br]);
            } else {
                $brs[$br] = 1;
            }
            if (array_key_exists($tl, $bls)) {
                unset($bls[$tl]);
            } elseif (array_key_exists($tl, $trs)) {
                unset($trs[$tl]);
            } else {
                $tls[$tl] = 1;
            }
            if (array_key_exists($tr, $tls)) {
                unset($tls[$tr]);
            } elseif (array_key_exists($tr, $brs)) {
                unset($brs[$tr]);
            } else {
                $trs[$tr] = 1;
            }
        }
        if (count($bls) !== 1 || count($brs) !== 1 || count($tls) !== 1 || count($trs) !== 1) {
            return false;
        }
        return true;
    }
}
