<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use voku\helper\HtmlDomParser;


class ParseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mail = $request->get('html');
        $xml = HtmlDomParser::str_get_html($mail);

        $recipient_1 = $xml->find('h1', 0)->plaintext;
        $recipient_2 = str_replace('Werkopdracht voor ', '', $recipient_1);
        $recipient = substr($recipient_2, 0, strpos($recipient_2, "te"));

        $location_1 = $xml->find('h1', 0)->plaintext;
        $location_2 = strstr($location_1, "te", false);
        $location = str_replace('te ', '', $location_2);
        $summary = $xml->find('p', 2)->plaintext;
        $name = $xml->find('td p', 1)->plaintext;
        $mail = $xml->find('td p', 3)->plaintext;
        $address = $xml->find('td p', 5)->plaintext;
        $tel = $xml->find('td p', 7)->plaintext;
        $ref = $xml->find('td p', 9)->plaintext;
        $creationdate = $xml->find('td p', 11)->plaintext;
        $urgency = $xml->find('td p', 13)->plaintext;
        $maxprice = $xml->find('td p', 15)->plaintext;


        $data = array(
            'recipient'=>$recipient,
            'location'=>$location,
            'summary'=>$summary,
            'name'=>$name,
            'mail'=>$mail,
            'address'=>$address,
            'tel'=>$tel,
            'ref'=>$ref,
            'creationdate'=>$creationdate,
            'urgency'=>$urgency,
            'maxprice'=>$maxprice,
        );

        return view('view-xml', ["xml"=>$xml])->with('data', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
