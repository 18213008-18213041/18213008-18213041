// Name/NIM    : Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
// Date        : 29 September 2015
// Source      : WebpagesDownloader.java

import java.io.*;
import java.net.*;
import java.util.*;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

public class WebpagesDownloader {
   public static List<String> getHyperlinks(String url) {
      List<String> urls = new ArrayList<String>();
      try {
         Document doc = Jsoup.connect(url).get();
         Elements links = doc.select("a[href]");
         for(Element l: links){
              urls.add(l.attr("abs:href"));
         }              
      } catch(IOException e) {
         e.printStackTrace();
      }
      return urls;
   }

   public static void printHyperlinks(List<String> links) {
      for(String link : links) {
         System.out.println("link: " + link);
      }
   }

   public static void downloadWebpage(String link, String data) throws Exception {
      URL url = new URL(link);
      BufferedReader reader = new BufferedReader
      (new InputStreamReader(url.openStream()));
      BufferedWriter writer = new BufferedWriter
      (new FileWriter(data));
      String line;
      while ((line = reader.readLine()) != null) {
         writer.write(line);
         writer.newLine();
      }
      reader.close();
      writer.close();
   }

   public static void main (String[] args) {
      int counter = 0;
      try {
         downloadWebpage("https://stei.itb.ac.id/", "Data.html");      
      } catch(Exception e) {
         e.printStackTrace();
      }
      List<String> urls = getHyperlinks("https://stei.itb.ac.id/");
      printHyperlinks(urls);
   
     for(String url : urls) {
         try {
            downloadWebpage(url, "SubData" + counter + ".html");      
         } catch(Exception e) {
            e.printStackTrace();
         }      
      }
   }
}
