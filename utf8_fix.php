    /**
     *  Fix some Fr UTF-8 Breaks
     * @param $broken_string
     *
     * @return string
     */
    public function fixUtf8($broken_string)
    {
        $brokenUtf8ToUtf8 = [
            "\xc2\x80" => "\xe2\x82\xac", // €

            "\xc2\x82" => "\xe2\x80\x9a", // ‚
            "\xc2\x83" => "\xc6\x92", // ƒ
            "\xc2\x84" => "\xe2\x80\x9e", // „
            "\xc2\x85" => "\xe2\x80\xa6", // …
            "\xc2\x86" => "\xe2\x80\xa0", // †
            "\xc2\x87" => "\xe2\x80\xa1", // ‡
            "\xc2\x88" => "\xcb\x86", // ˆ
            "\xc2\x89" => "\xe2\x80\xb0", // ‰
            "\xc2\x8a" => "\xc5\xa0", // Š
            "\xc2\x8b" => "\xe2\x80\xb9", // ‹
            "\xc2\x8c" => "\xc5\x92", // Œ

            "\xc2\x8e" => "\xc5\xbd", // Ž


            "\xc2\x91" => "\xe2\x80\x98", // ‘
            "\xc2\x92" => "\xe2\x80\x99", // ’
            "\xc2\x93" => "\xe2\x80\x9c", // “
            "\xc2\x94" => "\xe2\x80\x9d", // ”
            "\xc2\x95" => "\xe2\x80\xa2", // •
            "\xc2\x96" => "\xe2\x80\x93", // –
            "\xc2\x97" => "\xe2\x80\x94", // —
            "\xc2\x98" => "\xcb\x9c", // ˜
            "\xc2\x99" => "\xe2\x84\xa2", // ™
            "\xc2\x9a" => "\xc5\xa1", // š
            "\xc2\x9b" => "\xe2\x80\xba", // ›

            "\xc2\x9e" => "\xc5\xbe", // ž
            "\xc2\x9f" => "\xc5\xb8", // Ÿ
            "\xc2\x9c" => 'œ',
        ];

        foreach ($brokenUtf8ToUtf8 as $search => $replace) {
            $broken_string =  preg_replace('/' . $search . '/', $replace, $broken_string);
        }
        return $broken_string;

    }
