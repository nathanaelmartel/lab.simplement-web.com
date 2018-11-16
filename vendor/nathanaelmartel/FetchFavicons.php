<?php

namespace simplementWeb;

use Symfony\Component\DomCrawler\Crawler;

class FetchFavicons
{
    private $url;
    private $website_root;
    private $domain;
    private $favicons;

    function __construct($url)
    {
        $this->url = $url;
        $this->cleanDomain();
        $this->findWebsiteRoot();
        $this->favicons = $this->fetchFavicons();
    }

    private function findWebsiteRoot()
    {
        $this->website_root = $this->url;

        if (strpos($this->url, '/', 10)) {
            $this->website_root = substr($this->url, 0, strpos($this->url, '/', 10));
        }
    }

    public function getWebsiteRoot()
    {
        return $this->website_root;
    }

    private function cleanDomain()
    {
        $domain = str_replace('https', '', $this->url);
        $domain = str_replace('http', '', $domain);
        $domain = trim($domain, ' :/');

        $domain_pieces = explode('.', $domain);
        $domain = $domain_pieces[count($domain_pieces)-2].'.'.$domain_pieces[count($domain_pieces)-1];

        $domain_pieces = explode('/', $domain);
        $domain = $domain_pieces[0];

        $this->domain = $domain;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    private function fetchFavicons()
    {
        $favicons = array();

        if ($this->urlExist($this->url)) {
            $crawler = new Crawler(file_get_contents($this->url));

            $crawler = $crawler->filter('link')->reduce(function (Crawler $node, $i) {
                if (substr_count($node->attr('rel'), 'icon') > 0) {
                    return true;
                }
                if (substr_count($node->attr('rel'), 'shortcut') > 0) {
                    return true;
                }
                if (substr_count($node->attr('rel'), 'apple-touch-icon') > 0) {
                    return true;
                }
                return false;
            });

            $favicons = $crawler->filter('link')->each(function (Crawler $node, $i) {
                return $node->attr('href');
            });
            foreach ($favicons as $key => $value) {
                $favicons[$key] = $this->website_root.$value;
            }
            $favicons[] = $this->website_root.'/favicon.ico';
            $favicons = array_unique($favicons);

            foreach ($favicons as $key => $value) {
                if ($this->urlExist($value)) {
                    $favicons[$key] = array(
                        'url' => $value,
                        'content' => file_get_contents($value),
                    );
                } else {
                    unset($favicons[$key]);
                }
            }

            foreach ($favicons as $key => $value) {
                $favicons[$key]['mime'] = $this->getMime($value['content']);
            }
        } elseif ($this->url != $this->website_root) {
            $this->url = $this->website_root;
            $favicons = $this->fetchFavicons();
        }

        return $favicons;
    }

    public function getFavicons()
    {
        return $this->favicons;
    }

    public function getFavicon($mime = 'ico')
    {
        foreach ($this->favicons as $value) {
            if (substr_count($value['mime'], $mime) > 0) {
                return $value;
            }
        }

        return null;
    }

    private function urlExist($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);

        return $status;
    }

    private function getMime($content)
    {
        $finfo = new \finfo(FILEINFO_MIME);

        return $finfo->buffer($content);
    }
}
