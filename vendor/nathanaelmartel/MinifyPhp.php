<?php

namespace simplementWeb;

class MinifyPhp
{
    public function minifyFile($filename)
    {
        return $this->minify(file_get_contents($filename));
    }

    public function minify($content)
    {
        $letter = 'a';
        $vars = array();
        $tokens = token_get_all($content);
        $output = '';

        foreach ($tokens as $token) {
            if (is_array($token)) {
                switch ($token[0]) {
                    case T_COMMENT:
                        break;
                    case T_WHITESPACE:
                        $token[1] = ' ';
                        break;
                    case T_VARIABLE:
                        if (0 == substr_count($token[1], '$_')) {
                            if (!isset($vars[$token[1]])) {
                                $vars[$token[1]] = $letter++;
                            }
                            $token[1] = '$'.$vars[$token[1]];
                            break;
                        }
                }

                $token = $token[1];
            }

            $output .= $token;
        }

        return $output;
    }
}
