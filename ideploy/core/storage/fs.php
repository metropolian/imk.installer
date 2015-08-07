<?php 

    function MakePath($V = null)
    {
        $PS = DIRECTORY_SEPARATOR;
        $A = (is_array($V)) ? $V : func_get_args();
        $res = array();
        foreach ($A as $V) {
            $res[] = (count($res) > 0) ? trim($V, '\\/') : rtrim($V, '\\/');
        }
        
        return implode($PS, $res);
    }

    function DirectoryCopy($source, $dest, $permissions = 0755)
    {
        // Check for symlinks
        if (is_link($source)) {
            return symlink(readlink($source), $dest);
        }

        // Simple copy for a file
        if (is_file($source)) {
            return copy($source, $dest);
        }

        // Make destination directory
        if (!is_dir($dest)) {
            mkdir($dest, $permissions);
        }

        // Loop through the folder
        $dir = dir($source);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Deep copy directories
            DirectoryCopy("$source/$entry", "$dest/$entry", $permissions);
        }

        // Clean up
        $dir->close();
        return true;
    }

?>